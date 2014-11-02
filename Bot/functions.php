<?php
    function initSocket()
    {
        $port = 12345;
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);
        socket_bind($socket, null, $port);
        socket_listen($socket);
        return(socket_accept($socket));
    }

    function setLocalSpeed($speed)
    {
        /*********
            Sets in-game client speed for quick testing.
            Be sure to disable this during competitive play.
        */
        addCommand(41, $speed);
    }

    function sendFlags( $socket, $enableUserInput, $enableCompleteBotInformation, $printCommandsToConsole, $performTerrainAnalysis )
    {
        $flagString =
                    $enableUserInput .
                    $enableCompleteBotInformation . 
                    $printCommandsToConsole . 
                    $performTerrainAnalysis;

        write_loud( $socket, $flagString );
    }

    function getChokeDetails($data)
    {
        global $gameData;

        // Do something with choke data
        // ...
        // ...

    }

    function getLocations($data)
    {
        //Packet Data:'Locations:7;6:53;55'
        $location_list = explode(":", $data);

        //remove the first key ('Locations' text)
        array_shift($location_list);

        foreach($location_list as $location)
        {
            $locations[] = Array( 
                "x"=>substr( $location, 0, strpos( $location, ";" ) ),
                "y"=>substr( $location, strpos( $location, ";" )+1 ) 
                );
        }
        return $locations;
    }

    function getMapDetails($data)
    {
        /*
            MapName:mapWidth:mapHeight:tile1Height;tile1Buildable;tile1Walkable:tile2Height;tile2Buildable;tile2Walkable:...
            -counting tiles from left to right and top to bottom

            /**************
            * 
            * 
            *  Side note: The actual DLL found at http://eis.ucsc.edu/StarProxyBot does NOT actually
            *  produce the output it claims it does. (in regards to tile data) (11/22/2009)
            * 
            *  The message protocol actually just sends all of the tile data in this format:
            * 
            *  MapName:mapWidth:mapHeight:tile1Heighttile1Buildabletile1Walkabletile2Heighttile2Buildable
            *   and so on. 
            *
            *    However, I have modified the DLL to send the message in this format:
        mapData:MapName:mapWidth:mapHeight:tile1Heighttile1Buildabletile1Walkabletile2Heighttile2Buildable
            * The only difference being the "mapData:" added to the beginning.
            * 
            ***************
        */

        $map_data = explode(":", $data);

        //remove the first key ('mapData' text)
        array_shift($map_data);
        return Array("mapName"=>$map_data[0], "mapHeight"=>$map_data[1], "mapWidth"=>$map_data[2], "tileData"=>$map_data[3]);
    }

    function write_loud($socket, $data)
    {
        global $gameData;
        if($gameData['debug'] == 1)
            printf("write_loud('%s')\n",$data);

        socket_write($socket,$data);
    }

    function executeCommands()
    {
        global $commandString, $client;
        /*********
            ExecuteCommands():
                Sends the final command string to the dll

                Every string starts with ":0;0;0;0;0" as a work around
                due to problems with the dll

                This is a problem I encountered with the first version of the bot
                that I haven't got around to fixing yet.
                
                The amount of extra data being sent as as a result is negligible.

                This is a low priority issue to fix.
        */
        $final = ":0;0;0;0;0".$commandString;
        if($final == ":0;0;0;0;0")
        {
            //No need to announce a blank command.
            socket_write($client,$final);
        } else {
            write_loud($client, $final);
            $commandString = "";
        }
    }

    //Adds commands to the command queue to be sent to the dll
    function addCommand($command, $unitID, $arg1=0, $arg2=0, $arg3=0)
    {
        global $commandString, $gameData;
        if($gameData['debug'] == 1)
            printf("addCommand(%d,%d,%d,%d,%d)\n", $command, $unitID, $arg1, $arg2, $arg3);

        $commandString .= ":".$command.";".$unitID.";".$arg1.";".$arg2.";".$arg3;
    }

    function retrieveGameData($data)
    {
        global $botData, $unitData;
        /*
            data format:
            s;botMineralsCount;botGasCount;botSupplyUsed;botSupplyTotal;botResearchStatus;botUpgradeStatus
            :unit1ID;unit1PlayerID;unit1TypeID;unit1TileX;unit1TileY;unit1Health;unit1Shields;unit1Energy;unit1RemainingBuildTime;unit1RemainingTrainTime;unit1RemainingResearchTime;unit1RemainingUpgradeTime;unit1OrderTimer;unit1OrderID;unit1Resources;unit1AddOnID;unit1MineCount
        */
        $tmp = explode(";", $data);

        // all general bot variables reset every onFrame() call
        $botData['minerals'] = $tmp[1];
        $botData['gas'] = $tmp[2];
        $botData['supplyUsed'] = $tmp[3];
        $botData['supplyTotal'] = $tmp[4];
        $botData['research'] = $tmp[5];
        $botData['upgrade'] = $tmp[6];

        $tmp = explode(":", $data);
        //remove the first key of $tmp, which is all the previous values (minerals,gas,etc)
        array_shift($tmp);

        $unitIndex=0;

        foreach($tmp as $unit)
        {
            $unitDetails = explode(";", $unit);
            $unitData[$unitIndex] =    Array(
                "unitID"=>$unitDetails[0], 
                "playerID"=>$unitDetails[1], 
                "typeID"=>$unitDetails[2], 
                "positionX"=>$unitDetails[3], 
                "positionY"=>$unitDetails[4], 
                "hitpoints"=>$unitDetails[5], 
                "shields"=>$unitDetails[6], 
                "energy"=>$unitDetails[7], 
                "remainingBuildTime"=>$unitDetails[8], 
                "remainingTrainTime"=>$unitDetails[9], 
                "remainingResearchTime"=>$unitDetails[10], 
                "remainingUpgradeTime"=>$unitDetails[11], 
                "orderTimer"=>$unitDetails[12],
                "order"=>$unitDetails[13], 
                "resources"=>$unitDetails[14],
                "addon"=>$unitDetails[15], 
                "spiderMineCount"=>$unitDetails[16],
                "target"=>$unitDetails[17],
                "targetX"=>$unitDetails[18],
                "targetY"=>$unitDetails[19],
                "targetPosition"=>$unitDetails[20]
                );

            /*******
            * note: target, targetX, targetY, targetPosition are all additions to my DLL.
            * They won't return any values on the original DLL that comes with ProxyBot.
            */
            $unitIndex++;
        }
        return;
    }

    //returns specific unit property for unitID
    // usage getUnitProperty(3, "hitpoints");
    function getUnitProperty($unitID, $property)
    {
        global $unitData;
        foreach($unitData as $unit)
        {
            if($unit['unitID'] == $unitID)
            {
                return $unit[$property];
            }
        }
    }

    //returns all unitData for specific unitID
    function getUnitData($unitID)
    {
        global $unitData;
        foreach($unitData as $unit)
        {
            if($unit['unitID'] == $unitID)
                return $unit;
        }
        return -1;
    }

    // finds the first typeID owned by playerID, returns unitID
    function findUnit($playerID, $typeID)
    {
        global $unitData, $gameData;
        if($gameData['debug'] == 1)
            printf("fintUnit(%d,%d)\n", $playerID, $typeID);

        //playerID set to 255 is a wildcard
        foreach($unitData as $unit)
        {
            if( ($unit['playerID'] == $playerID && $unit['typeID'] == $typeID) ||
                ($playerID == 255 && $unit['typeID'] == $typeID) )
                return $unit['unitID'];
        }
        return -1;
    }
?>