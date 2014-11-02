<?php
    require_once("constants.php");
    require_once("functions.php");

    // local client speed definition. example: php -q bot.php 30
    // default: 50
    $gameData['speed'] = ($argv[1])?$argv[1]:50;
    //Whether or not debug data is printed with socket_write() calls
    $gameData['debug'] = 1;
    $client = initSocket();

    while(true)
    {
        usleep(35000);
        $readSocket = @socket_read($client, 6144);

        //client disconnect
        if($readSocket == null)
            return;

        $buffer .= $readSocket;

        //find end of packet (all messages are terminated with \n)
        while( ($pos = strpos($buffer, "\n")) !== FALSE )
        {

            $packet = trim(substr($buffer,0,$pos));
            $buffer = substr($buffer,$pos+1);
            /************
            * New game started. Retreive our ID from the string.
            * Other data is present in the string, but for now
            * we'll discard it.
            * 
            *  :#DATA FORMAT#:
            *  
            *  NewGame;PlayerIDforTheBot
            *  :Player1ID;Player1Race;Player1Name;Player1PlayerType;Player1isAlly
            *  :Player2ID;Player2Race;Player2Name;Player2PlayerType;Player2isAlly
            */
            if( substr($packet, 0, 7) == "NewGame")
            {
                $botData['ID'] = substr($packet, 8, 1);
                //enableUserInput,enableCompleteBotInformation,printCommandsToConsole,performTerranAnalysis
                sendFlags($client, 1, 0, 1, 1);
            } else 

            /************
            * New game started. Location data sent in this string.
            *
            *  :#DATA FORMAT#:
            *
            *  Locations:Location1x;Location1y:Location2x;Location2y:..
            *
            */
            if( substr($packet, 0, 9) == "Locations")
            {
                $locationData = getLocations($packet);
            } else 

            /********
            *
            *MapName:mapWidth:mapHeight:tile1Height;tile1Buildable;tile1Walkable:tile2Height;tile2Buildable;tile2Walkable:...
            * -counting tiles from left to right and top to bottom
            *
            *
            */            
            if( substr($packet, 0, 7) == "mapData")
            {
                $mapData = getMapDetails($packet);
            } else 

            /*******
            *
            *
            *
            **from Terrain Analysis:
            */
            if( substr($packet, 0, 6) == "Chokes")
            {
                //currently does nothing
                $chokeData = getChokeDetails($packet);
            } else 

            /*********************
            *  Receiving GAME DATA
            *  ExampleAIModule.dll will send data every onFrame() call
            *  
            *  
            *  :#DATA FORMAT#:
            *  (from the Message Protocol: http://eis.ucsc.edu/StarProxyBot)
            *  onFrame messages:
            *   1. AIModule sends the unit status's to the ProxyBot:
            *    s;botMineralsCount;botGasCount;botSupplyUsed;botSupplyTotal;botResearchStatus;botUpgradeStatus

                :unit1ID;unit1PlayerID;unit1TypeID;unit1TileX;unit1TileY;unit1Health;unit1Shields;unit1Energy;unit1RemainingBuildTime;unit1RemainingTrainTime;unit1RemainingResearchTime;unit1RemainingUpgradeTime;unit1OrderTimer;unit1OrderID;unit1Resources;unit1AddOnID;unit1MineCount

                :unit2ID;unit2PlayerID;unit2TypeID;unit2TileX;unit2TileY;unit2Health;unit2Shields;unit2Energy;unit2RemainingBuildTime;unit2RemainingTrainTime;unit2RemainingResearchTime;unit2RemainingUpgradeTime;unit2OrderTimer;unit2OrderID;unit2Resources;unit2AddOnID;unit2MineCount


            *  Repeating for ALL UNITS
            *
            *
            *
            *  bot research status, char array[47], defines the status of TechTypes.
            *    0 = not upgraded, 1 = in progress, 4 = researched
            *
            *  -bot upgrade status, char array[63], defines the status of UpgradeTypes.
            *    0 = not upgraded, 1-3 = upgrade level, 4 = in progress
            *
            *
            *   2. AIModule waits for a list of commands from the ProxyBot
            *    commands:
            *     :command1ID;command1UnitID;command1Arg1;command1Arg2;command1Arg3
            *     :command2ID;command2UnitID;command2Arg1;command2Arg2;command2Arg3
            *     :etc
            */
            if( substr($packet, 0, 1) == "s")
            {
                //Process all commands in the command queue (from the previous frame)
                executeCommands();

                /*******
                * retrieveGameData(data string)
                *  sets values, such as:
                *  minerals, gas, supplyUsed, supplyTotal, research, upgrade
                *
                *  and builds all unit arrays
                */
                unset($unitData);
                retrieveGameData($packet);

                if( $gameData['speed'] != -1 )
                {
                    setLocalSpeed($gameData['speed']);
                    $gameData['speed'] = -1;
                }

                /*
                    implement ai here
                    ...

                    Example below:
                    Finds any idle worker and issues them to harvest minerals.
                    There is no even distribution of workers or anything like that.
                    This example will send all of the probes to the same mineral patch.
                */
                foreach($unitData as $unit)
                {
                    if(
                        ($unit['playerID'] == $botData['ID'] &&// is this our unit?
                        $unit['order'] == $order_def['PlayerGuard']) // is this worker doing nothing?
                        &&
                        ($unit['typeID'] == $unit_def['Protoss_Probe']['unitID'] ||// is this unit a probe?
                        $unit['typeID'] == $unit_def['Terran_SCV']['unitID'] ||// or an scv?
                        $unit['typeID'] == $unit_def['Zerg_Drone']['unitID'])// or a drone?
                    ){

                        // findUnit usage: findUnit(playerID, unitID)
                        // playerID set to 255 represents a wildcard.
                        // findUnit returns unitID on success, -1 on failure
                        //

                        // addCommand usage: addCommad(commandID, unitID, arg1=0, arg2=0, arg3=0)
                        if( ( $mineral_patch = findUnit(255, $unit_def['Resource_Mineral_Field']['unitID']) ) != -1)
                            addCommand($command_def['rightClickUnit'], $unit['unitID'], $mineral_patch);

                    }
                }

            } else {
            /***************
            * Unknown message
            *  
            * ??? This likely should not come up
            */
                //Forcing a blank reply to keep server-client interaction active
                //  (Starcraft will freeze until data is sent)
                executeCommands();
            }
        }
    }

    
?>