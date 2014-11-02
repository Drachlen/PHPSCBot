<?php
    $botData = Array();
    $gameData = Array();
    $unitData = Array();
    $unitDataByID = Array();
    $commandString = "";

    //Every unit & associated unitID:
    $unit_def['Terran_Marine']['unitID'] = 0;
    $unit_def['Terran_Ghost']['unitID'] = 1;
    $unit_def['Terran_Vulture']['unitID'] = 2;
    $unit_def['Terran_Goliath']['unitID'] = 3;
    $unit_def['Terran_Siege_Tank_Tank_Mode']['unitID'] = 5;
    $unit_def['Terran_SCV']['unitID'] = 7;
    $unit_def['Terran_Wraith']['unitID'] = 8;
    $unit_def['Terran_Science_Vessel']['unitID'] = 9;
    $unit_def['Terran_Dropship']['unitID'] = 11;
    $unit_def['Terran_Battlecruiser']['unitID'] = 12;
    $unit_def['Terran_Vulture_Spider_Mine']['unitID'] = 13;
    $unit_def['Terran_Nuclear_Missile']['unitID'] = 14;
    $unit_def['Terran_Siege_Tank_Siege_Mode']['unitID'] = 30;
    $unit_def['Terran_Firebat']['unitID'] = 32;
    $unit_def['Spell_Scanner_Sweep']['unitID'] = 33;
    $unit_def['Terran_Medic']['unitID'] = 34;
    $unit_def['Zerg_Larva']['unitID'] = 35;
    $unit_def['Zerg_Egg']['unitID'] = 36;
    $unit_def['Zerg_Zergling']['unitID'] = 37;
    $unit_def['Zerg_Hydralisk']['unitID'] = 38;
    $unit_def['Zerg_Ultralisk']['unitID'] = 39;
    $unit_def['Zerg_Broodling']['unitID'] = 40;
    $unit_def['Zerg_Drone']['unitID'] = 41;
    $unit_def['Zerg_Overlord']['unitID'] = 42;
    $unit_def['Zerg_Mutalisk']['unitID'] = 43;
    $unit_def['Zerg_Guardian']['unitID'] = 44;
    $unit_def['Zerg_Queen']['unitID'] = 45;
    $unit_def['Zerg_Defiler']['unitID'] = 46;
    $unit_def['Zerg_Scourge']['unitID'] = 47;
    $unit_def['Zerg_Infested_Terran']['unitID'] = 50;
    $unit_def['Terran_Valkyrie']['unitID'] = 58;
    $unit_def['Zerg_Cocoon']['unitID'] = 59;
    $unit_def['Protoss_Corsair']['unitID'] = 60;
    $unit_def['Protoss_Dark_Templar']['unitID'] = 61;
    $unit_def['Zerg_Devourer']['unitID'] = 62;
    $unit_def['Protoss_Dark_Archon']['unitID'] = 63;
    $unit_def['Protoss_Probe']['unitID'] = 64;
    $unit_def['Protoss_Zealot']['unitID'] = 65;
    $unit_def['Protoss_Dragoon']['unitID'] = 66;
    $unit_def['Protoss_High_Templar']['unitID'] = 67;
    $unit_def['Protoss_Archon']['unitID'] = 68;
    $unit_def['Protoss_Shuttle']['unitID'] = 69;
    $unit_def['Protoss_Scout']['unitID'] = 70;
    $unit_def['Protoss_Arbiter']['unitID'] = 71;
    $unit_def['Protoss_Carrier']['unitID'] = 72;
    $unit_def['Protoss_Interceptor']['unitID'] = 73;
    $unit_def['Protoss_Reaver']['unitID'] = 83;
    $unit_def['Protoss_Observer']['unitID'] = 84;
    $unit_def['Protoss_Scarab']['unitID'] = 85;
    $unit_def['Critter_Rhynadon']['unitID'] = 89;
    $unit_def['Critter_Bengalaas']['unitID'] = 90;
    $unit_def['Critter_Scantid']['unitID'] = 93;
    $unit_def['Critter_Kakaru']['unitID'] = 94;
    $unit_def['Critter_Ragnasaur']['unitID'] = 95;
    $unit_def['Critter_Ursadon']['unitID'] = 96;
    $unit_def['Zerg_Lurker_Egg']['unitID'] = 97;
    $unit_def['Zerg_Lurker']['unitID'] = 103;
    $unit_def['Spell_Disruption_Web']['unitID'] = 105;
    $unit_def['Terran_Command_Center']['unitID'] = 106;
    $unit_def['Terran_Comsat_Station']['unitID'] = 107;
    $unit_def['Terran_Nuclear_Silo']['unitID'] = 108;
    $unit_def['Terran_Supply_Depot']['unitID'] = 109;
    $unit_def['Terran_Refinery']['unitID'] = 110;
    $unit_def['Terran_Barracks']['unitID'] = 111;
    $unit_def['Terran_Academy']['unitID'] = 112;
    $unit_def['Terran_Factory']['unitID'] = 113;
    $unit_def['Terran_Starport']['unitID'] = 114;
    $unit_def['Terran_Control_Tower']['unitID'] = 115;
    $unit_def['Terran_Science_Facility']['unitID'] = 116;
    $unit_def['Terran_Covert_Ops']['unitID'] = 117;
    $unit_def['Terran_Physics_Lab']['unitID'] = 118;
    $unit_def['Terran_Machine_Shop']['unitID'] = 120;
    $unit_def['Terran_Engineering_Bay']['unitID'] = 122;
    $unit_def['Terran_Armory']['unitID'] = 123;
    $unit_def['Terran_Missile_Turret']['unitID'] = 124;
    $unit_def['Terran_Bunker']['unitID'] = 125;
    $unit_def['Special_Crashed_Norad_II']['unitID'] = 126;
    $unit_def['Special_Ion_Cannon']['unitID'] = 127;
    $unit_def['Zerg_Infested_Command_Center']['unitID'] = 130;
    $unit_def['Zerg_Hatchery']['unitID'] = 131;
    $unit_def['Zerg_Lair']['unitID'] = 132;
    $unit_def['Zerg_Hive']['unitID'] = 133;
    $unit_def['Zerg_Nydus_Canal']['unitID'] = 134;
    $unit_def['Zerg_Hydralisk_Den']['unitID'] = 135;
    $unit_def['Zerg_Defiler_Mound']['unitID'] = 136;
    $unit_def['Zerg_Greater_Spire']['unitID'] = 137;
    $unit_def['Zerg_Queen_s_Nest']['unitID'] = 138;
    $unit_def['Zerg_Evolution_Chamber']['unitID'] = 139;
    $unit_def['Zerg_Ultralisk_Cavern']['unitID'] = 140;
    $unit_def['Zerg_Spire']['unitID'] = 141;
    $unit_def['Zerg_Spawning_Pool']['unitID'] = 142;
    $unit_def['Zerg_Creep_Colony']['unitID'] = 143;
    $unit_def['Zerg_Spore_Colony']['unitID'] = 144;
    $unit_def['Zerg_Sunken_Colony']['unitID'] = 146;
    $unit_def['Special_Overmind_With_Shell']['unitID'] = 147;
    $unit_def['Special_Overmind']['unitID'] = 148;
    $unit_def['Zerg_Extractor']['unitID'] = 149;
    $unit_def['Special_Mature_Chrysalis']['unitID'] = 150;
    $unit_def['Special_Cerebrate']['unitID'] = 151;
    $unit_def['Special_Cerebrate_Daggoth']['unitID'] = 152;
    $unit_def['Protoss_Nexus']['unitID'] = 154;
    $unit_def['Protoss_Robotics_Facility']['unitID'] = 155;
    $unit_def['Protoss_Pylon']['unitID'] = 156;
    $unit_def['Protoss_Assimilator']['unitID'] = 157;
    $unit_def['Protoss_Observatory']['unitID'] = 159;
    $unit_def['Protoss_Gateway']['unitID'] = 160;
    $unit_def['Protoss_Photon_Cannon']['unitID'] = 162;
    $unit_def['Protoss_Citadel_of_Adun']['unitID'] = 163;
    $unit_def['Protoss_Cybernetics_Core']['unitID'] = 164;
    $unit_def['Protoss_Templar_Archives']['unitID'] = 165;
    $unit_def['Protoss_Forge']['unitID'] = 166;
    $unit_def['Protoss_Stargate']['unitID'] = 167;
    $unit_def['Special_Stasis_Cell_Prison']['unitID'] = 168;
    $unit_def['Protoss_Fleet_Beacon']['unitID'] = 169;
    $unit_def['Protoss_Arbiter_Tribunal']['unitID'] = 170;
    $unit_def['Protoss_Robotics_Support_Bay']['unitID'] = 171;
    $unit_def['Protoss_Shield_Battery']['unitID'] = 172;
    $unit_def['Special_Khaydarin_Crystal_Form']['unitID'] = 173;
    $unit_def['Special_Protoss_Temple']['unitID'] = 174;
    $unit_def['Special_XelNaga_Temple']['unitID'] = 175;
    $unit_def['Resource_Mineral_Field']['unitID'] = 176;
    $unit_def['Resource_Vespene_Geyser']['unitID'] = 188;
    $unit_def['Special_Warp_Gate']['unitID'] = 189;
    $unit_def['Special_Psi_Disrupter']['unitID'] = 190;
    $unit_def['Special_Power_Generator']['unitID'] = 200;
    $unit_def['Special_Overmind_Cocoon']['unitID'] = 201;
    $unit_def['Spell_Dark_Swarm']['unitID'] = 202;
    $unit_def['None']['unitID'] = 228;
    $unit_def['Unknown']['unitID'] = 229;

    /********
    // UNIT HP DEFINITIONS:
    // -1 definitions could mean:
    // 1. unit doesn't have any health (a spell effect, a nuke, etc)
    // OR
    // 2. unit type is not important
    //
    // Protoss units health is simply Hit Points + Shields = HP
    */

    $unit_def['Terran_Marine']['HP'] = 40;
    $unit_def['Terran_Ghost']['HP'] = 45;
    $unit_def['Terran_Vulture']['HP'] = 80;
    $unit_def['Terran_Goliath']['HP'] = 125;
    $unit_def['Terran_Siege_Tank_Tank_Mode']['HP'] = 150;
    $unit_def['Terran_SCV']['HP'] = 60;
    $unit_def['Terran_Wraith']['HP'] = 120;
    $unit_def['Terran_Science_Vessel']['HP'] = 200;
    $unit_def['Terran_Dropship']['HP'] = 150;
    $unit_def['Terran_Battlecruiser']['HP'] = 500;
    $unit_def['Terran_Vulture_Spider_Mine']['HP'] = 20;
    $unit_def['Terran_Nuclear_Missile']['HP'] = 100;
    $unit_def['Terran_Siege_Tank_Siege_Mode']['HP'] = 150;
    $unit_def['Terran_Firebat']['HP'] = 50;
    $unit_def['Spell_Scanner_Sweep']['HP'] = -1;
    $unit_def['Terran_Medic']['HP'] = 60;
    $unit_def['Zerg_Larva']['HP'] = -1;
    $unit_def['Zerg_Egg']['HP'] = -1;
    $unit_def['Zerg_Zergling']['HP'] = 35;
    $unit_def['Zerg_Hydralisk']['HP'] = 80;
    $unit_def['Zerg_Ultralisk']['HP'] = 400;
    $unit_def['Zerg_Broodling']['HP'] = 30;
    $unit_def['Zerg_Drone']['HP'] = 40;
    $unit_def['Zerg_Overlord']['HP'] = 200;
    $unit_def['Zerg_Mutalisk']['HP'] = 120;
    $unit_def['Zerg_Guardian']['HP'] = 150;
    $unit_def['Zerg_Queen']['HP'] = 120;
    $unit_def['Zerg_Defiler']['HP'] = 250;
    $unit_def['Zerg_Scourge']['HP'] = 25;
    $unit_def['Zerg_Infested_Terran']['HP'] = 60;
    $unit_def['Terran_Valkyrie']['HP'] = 200;
    $unit_def['Zerg_Cocoon']['HP'] = -1;
    $unit_def['Protoss_Corsair']['HP'] = 180;
    $unit_def['Protoss_Dark_Templar']['HP'] = 120;
    $unit_def['Zerg_Devourer']['HP'] = 250;
    $unit_def['Protoss_Dark_Archon']['HP'] = 225;
    $unit_def['Protoss_Probe']['HP'] = 40;
    $unit_def['Protoss_Zealot']['HP'] = 160;
    $unit_def['Protoss_Dragoon']['HP'] = 180;
    $unit_def['Protoss_High_Templar']['HP'] = 80;
    $unit_def['Protoss_Archon']['HP'] = 360;
    $unit_def['Protoss_Shuttle']['HP'] = 140;
    $unit_def['Protoss_Scout']['HP'] = 250;
    $unit_def['Protoss_Arbiter']['HP'] = 350;
    $unit_def['Protoss_Carrier']['HP'] = 450;
    $unit_def['Protoss_Interceptor']['HP'] = 80;
    $unit_def['Protoss_Reaver']['HP'] = 180;
    $unit_def['Protoss_Observer']['HP'] = 60;
    $unit_def['Protoss_Scarab']['HP'] = -1;
    $unit_def['Critter_Rhynadon']['HP'] = -1;
    $unit_def['Critter_Bengalaas']['HP'] = -1;
    $unit_def['Critter_Scantid']['HP'] = -1;
    $unit_def['Critter_Kakaru']['HP'] = -1;
    $unit_def['Critter_Ragnasaur']['HP'] = -1;
    $unit_def['Critter_Ursadon']['HP'] = -1;
    $unit_def['Zerg_Lurker_Egg']['HP'] = 100;
    $unit_def['Zerg_Lurker']['HP'] = 125;
    $unit_def['Spell_Disruption_Web']['HP'] = -1;
    $unit_def['Terran_Command_Center']['HP'] = 1500;
    $unit_def['Terran_Comsat_Station']['HP'] = 500;
    $unit_def['Terran_Nuclear_Silo']['HP'] = 600;
    $unit_def['Terran_Supply_Depot']['HP'] = 500;
    $unit_def['Terran_Refinery']['HP'] = 750;
    $unit_def['Terran_Barracks']['HP'] = 1000;
    $unit_def['Terran_Academy']['HP'] = 600;
    $unit_def['Terran_Factory']['HP'] = 1250;
    $unit_def['Terran_Starport']['HP'] = 1300;
    $unit_def['Terran_Control_Tower']['HP'] = 500;
    $unit_def['Terran_Science_Facility']['HP'] = 850;
    $unit_def['Terran_Covert_Ops']['HP'] = 750;
    $unit_def['Terran_Physics_Lab']['HP'] = 600;
    $unit_def['Terran_Machine_Shop']['HP'] = 750;
    $unit_def['Terran_Engineering_Bay']['HP'] = 850;
    $unit_def['Terran_Armory']['HP'] = 750;
    $unit_def['Terran_Missile_Turret']['HP'] = 200;
    $unit_def['Terran_Bunker']['HP'] = 350;
    $unit_def['Special_Crashed_Norad_II']['HP'] = -1;
    $unit_def['Special_Ion_Cannon']['HP'] = -1;
    $unit_def['Zerg_Infested_Command_Center']['HP'] = 1500;
    $unit_def['Zerg_Hatchery']['HP'] = 1250;
    $unit_def['Zerg_Lair']['HP'] = 1800;
    $unit_def['Zerg_Hive']['HP'] = 2500;
    $unit_def['Zerg_Nydus_Canal']['HP'] = 250;
    $unit_def['Zerg_Hydralisk_Den']['HP'] = 850;
    $unit_def['Zerg_Defiler_Mound']['HP'] = 850;
    $unit_def['Zerg_Greater_Spire']['HP'] = 1000;
    $unit_def['Zerg_Queen_s_Nest']['HP'] = 850;
    $unit_def['Zerg_Evolution_Chamber']['HP'] = 750;
    $unit_def['Zerg_Ultralisk_Cavern']['HP'] = 600;
    $unit_def['Zerg_Spire']['HP'] = 600;
    $unit_def['Zerg_Spawning_Pool']['HP'] = 750;
    $unit_def['Zerg_Creep_Colony']['HP'] = 400;
    $unit_def['Zerg_Spore_Colony']['HP'] = 400;
    $unit_def['Zerg_Sunken_Colony']['HP'] = 300;
    $unit_def['Special_Overmind_With_Shell']['HP'] = -1;
    $unit_def['Special_Overmind']['HP'] = -1;
    $unit_def['Zerg_Extractor']['HP'] = 750;
    $unit_def['Special_Mature_Chrysalis']['HP'] = -1;
    $unit_def['Special_Cerebrate']['HP'] = -1;
    $unit_def['Special_Cerebrate_Daggoth']['HP'] = -1;
    $unit_def['Protoss_Nexus']['HP'] = 1500;
    $unit_def['Protoss_Robotics_Facility']['HP'] = 1000;
    $unit_def['Protoss_Pylon']['HP'] = 600;
    $unit_def['Protoss_Assimilator']['HP'] = 900;
    $unit_def['Protoss_Observatory']['HP'] = 500;
    $unit_def['Protoss_Gateway']['HP'] = 1000;
    $unit_def['Protoss_Photon_Cannon']['HP'] = 200;
    $unit_def['Protoss_Citadel_of_Adun']['HP'] = 900;
    $unit_def['Protoss_Cybernetics_Core']['HP'] = 1000;
    $unit_def['Protoss_Templar_Archives']['HP'] = 1000;
    $unit_def['Protoss_Forge']['HP'] = 1100;
    $unit_def['Protoss_Stargate']['HP'] = 1200;
    $unit_def['Special_Stasis_Cell_Prison']['HP'] = -1;
    $unit_def['Protoss_Fleet_Beacon']['HP'] = 1000;
    $unit_def['Protoss_Arbiter_Tribunal']['HP'] = 1000;
    $unit_def['Protoss_Robotics_Support_Bay']['HP'] = 900;
    $unit_def['Protoss_Shield_Battery']['HP'] = 400;
    $unit_def['Special_Khaydarin_Crystal_Form']['HP'] = -1;
    $unit_def['Special_Protoss_Temple']['HP'] = -1;
    $unit_def['Special_XelNaga_Temple']['HP'] = -1;
    $unit_def['Resource_Mineral_Field']['HP'] = -1;
    $unit_def['Resource_Vespene_Geyser']['HP'] = -1;
    $unit_def['Special_Warp_Gate']['HP'] = -1;
    $unit_def['Special_Psi_Disrupter']['HP'] = -1;
    $unit_def['Special_Power_Generator']['HP'] = -1;
    $unit_def['Special_Overmind_Cocoon']['HP'] = -1;
    $unit_def['Spell_Dark_Swarm']['HP'] = -1;
    $unit_def['None']['HP'] = -1;
    $unit_def['Unknown']['HP'] = -1;

    /* unit weight:
    *
    * unit weight represents the strength of a unit
    * The base unit weight represents a unit that is full health. 
    * Units that are heavily damaged (beyond 50%) will have their weight reduced during total-weight calculations
    * Weight is also regional. Total weight is assigned to coordinates, small squared areas through out the map
    * that change based on enemy position
    *
    *  All of the weights are just randomly punched in as placeholders and have not been refined.
    *
    ****************/

    $unit_def['Terran_Marine']['weight'] = 0.3;
    $unit_def['Terran_Ghost']['weight'] = 0.2;
    $unit_def['Terran_Vulture']['weight'] = 0.5;
    $unit_def['Terran_Goliath']['weight'] = 0.5;
    $unit_def['Terran_Siege_Tank_Tank_Mode']['weight'] = 1.2;
    $unit_def['Terran_SCV']['weight'] = 0.1;
    $unit_def['Terran_Wraith']['weight'] = 0.7;
    $unit_def['Terran_Science_Vessel']['weight'] = 0.2;
    $unit_def['Terran_Dropship']['weight'] = 0.1;
    $unit_def['Terran_Battlecruiser']['weight'] = 2;
    $unit_def['Terran_Vulture_Spider_Mine']['weight'] = 0.4;
    $unit_def['Terran_Nuclear_Missile']['weight'] = 100;
    $unit_def['Terran_Siege_Tank_Siege_Mode']['weight'] = 1.8;
    $unit_def['Terran_Firebat']['weight'] = 0.4;
    $unit_def['Spell_Scanner_Sweep']['weight'] = 0;
    $unit_def['Terran_Medic']['weight'] = 0.6;
    $unit_def['Zerg_Larva']['weight'] = 0;
    $unit_def['Zerg_Egg']['weight'] = 0;
    $unit_def['Zerg_Zergling']['weight'] = 0.2;
    $unit_def['Zerg_Hydralisk']['weight'] = 0.4;
    $unit_def['Zerg_Ultralisk']['weight'] = 1.5;
    $unit_def['Zerg_Broodling']['weight'] = 0.1;
    $unit_def['Zerg_Drone']['weight'] = 0.1;
    $unit_def['Zerg_Overlord']['weight'] = 0;
    $unit_def['Zerg_Mutalisk']['weight'] = 0.8;
    $unit_def['Zerg_Guardian']['weight'] = 1.2;
    $unit_def['Zerg_Queen']['weight'] = 0.1;
    $unit_def['Zerg_Defiler']['weight'] = 0.3;
    $unit_def['Zerg_Scourge']['weight'] = 0.4;
    $unit_def['Zerg_Infested_Terran']['weight'] = 1.5;
    $unit_def['Terran_Valkyrie']['weight'] = 0.5;
    $unit_def['Zerg_Cocoon']['weight'] = 0;
    $unit_def['Protoss_Corsair']['weight'] = 0.5;
    $unit_def['Protoss_Dark_Templar']['weight'] = 1.5;
    $unit_def['Zerg_Devourer']['weight'] = 0.5;
    $unit_def['Protoss_Dark_Archon']['weight'] = 0.1;
    $unit_def['Protoss_Probe']['weight'] = 0.1;
    $unit_def['Protoss_Zealot']['weight'] = 0.4;
    $unit_def['Protoss_Dragoon']['weight'] = 0.6;
    $unit_def['Protoss_High_Templar']['weight'] = 0.2;
    $unit_def['Protoss_Archon']['weight'] = 0.7;
    $unit_def['Protoss_Shuttle']['weight'] = 0;
    $unit_def['Protoss_Scout']['weight'] = 0.4;
    $unit_def['Protoss_Arbiter']['weight'] = 0.3;
    $unit_def['Protoss_Carrier']['weight'] = 1;
    $unit_def['Protoss_Interceptor']['weight'] = 0.1;
    $unit_def['Protoss_Reaver']['weight'] = 1.2;
    $unit_def['Protoss_Observer']['weight'] = 0;
    $unit_def['Protoss_Scarab']['weight'] = 0;
    $unit_def['Critter_Rhynadon']['weight'] = 0;
    $unit_def['Critter_Bengalaas']['weight'] = 0;
    $unit_def['Critter_Scantid']['weight'] = 0;
    $unit_def['Critter_Kakaru']['weight'] = 0;
    $unit_def['Critter_Ragnasaur']['weight'] = 0;
    $unit_def['Critter_Ursadon']['weight'] = 0;
    $unit_def['Zerg_Lurker_Egg']['weight'] = 0;
    $unit_def['Zerg_Lurker']['weight'] = 1.2;
    $unit_def['Spell_Disruption_Web']['weight'] = 0.2;
    $unit_def['Terran_Command_Center']['weight'] = 0;
    $unit_def['Terran_Comsat_Station']['weight'] = 0;
    $unit_def['Terran_Nuclear_Silo']['weight'] = 0;
    $unit_def['Terran_Supply_Depot']['weight'] = 0;
    $unit_def['Terran_Refinery']['weight'] = 0;
    $unit_def['Terran_Barracks']['weight'] = 0;
    $unit_def['Terran_Academy']['weight'] = 0;
    $unit_def['Terran_Factory']['weight'] = 0;
    $unit_def['Terran_Starport']['weight'] = 0;
    $unit_def['Terran_Control_Tower']['weight'] = 0;
    $unit_def['Terran_Science_Facility']['weight'] = 0;
    $unit_def['Terran_Covert_Ops']['weight'] = 0;
    $unit_def['Terran_Physics_Lab']['weight'] = 0;
    $unit_def['Terran_Machine_Shop']['weight'] = 0;
    $unit_def['Terran_Engineering_Bay']['weight'] = 0;
    $unit_def['Terran_Armory']['weight'] = 0;
    $unit_def['Terran_Missile_Turret']['weight'] = 0;
    $unit_def['Terran_Bunker']['weight'] = 0.5;
    $unit_def['Special_Crashed_Norad_II']['weight'] = 0;
    $unit_def['Special_Ion_Cannon']['weight'] = 0;
    $unit_def['Zerg_Infested_Command_Center']['weight'] = 0;
    $unit_def['Zerg_Hatchery']['weight'] = 0;
    $unit_def['Zerg_Lair']['weight'] = 0;
    $unit_def['Zerg_Hive']['weight'] = 0;
    $unit_def['Zerg_Nydus_Canal']['weight'] = 0;
    $unit_def['Zerg_Hydralisk_Den']['weight'] = 0;
    $unit_def['Zerg_Defiler_Mound']['weight'] = 0;
    $unit_def['Zerg_Greater_Spire']['weight'] = 0;
    $unit_def['Zerg_Queen_s_Nest']['weight'] = 0;
    $unit_def['Zerg_Evolution_Chamber']['weight'] = 0;
    $unit_def['Zerg_Ultralisk_Cavern']['weight'] = 0;
    $unit_def['Zerg_Spire']['weight'] = 0;
    $unit_def['Zerg_Spawning_Pool']['weight'] = 0;
    $unit_def['Zerg_Creep_Colony']['weight'] = 0;
    $unit_def['Zerg_Spore_Colony']['weight'] = 0;
    $unit_def['Zerg_Sunken_Colony']['weight'] = 0;
    $unit_def['Special_Overmind_With_Shell']['weight'] = 0;
    $unit_def['Special_Overmind']['weight'] = 0;
    $unit_def['Zerg_Extractor']['weight'] = 0;
    $unit_def['Special_Mature_Chrysalis']['weight'] = 0;
    $unit_def['Special_Cerebrate']['weight'] = 0;
    $unit_def['Special_Cerebrate_Daggoth']['weight'] = 0;
    $unit_def['Protoss_Nexus']['weight'] = 0;
    $unit_def['Protoss_Robotics_Facility']['weight'] = 0;
    $unit_def['Protoss_Pylon']['weight'] = 0;
    $unit_def['Protoss_Assimilator']['weight'] = 0;
    $unit_def['Protoss_Observatory']['weight'] = 0;
    $unit_def['Protoss_Gateway']['weight'] = 0;
    $unit_def['Protoss_Photon_Cannon']['weight'] = 0.7;
    $unit_def['Protoss_Citadel_of_Adun']['weight'] = 0;
    $unit_def['Protoss_Cybernetics_Core']['weight'] = 0;
    $unit_def['Protoss_Templar_Archives']['weight'] = 0;
    $unit_def['Protoss_Forge']['weight'] = 0;
    $unit_def['Protoss_Stargate']['weight'] = 0;
    $unit_def['Special_Stasis_Cell_Prison']['weight'] = 0;
    $unit_def['Protoss_Fleet_Beacon']['weight'] = 0;
    $unit_def['Protoss_Arbiter_Tribunal']['weight'] = 0;
    $unit_def['Protoss_Robotics_Support_Bay']['weight'] = 0;
    $unit_def['Protoss_Shield_Battery']['weight'] = 0;
    $unit_def['Special_Khaydarin_Crystal_Form']['weight'] = 0;
    $unit_def['Special_Protoss_Temple']['weight'] = 0;
    $unit_def['Special_XelNaga_Temple']['weight'] = 0;
    $unit_def['Resource_Mineral_Field']['weight'] = 0;
    $unit_def['Resource_Vespene_Geyser']['weight'] = 0;
    $unit_def['Special_Warp_Gate']['weight'] = 0;
    $unit_def['Special_Psi_Disrupter']['weight'] = 0;
    $unit_def['Special_Power_Generator']['weight'] = 0;
    $unit_def['Special_Overmind_Cocoon']['weight'] = 0;
    $unit_def['Spell_Dark_Swarm']['weight'] = 0;
    $unit_def['None']['weight'] = 0;
    $unit_def['Unknown']['weight'] = 0;

    $command_def['attackMove'] = 1;            
    $command_def['attackUnit'] = 2;            
    $command_def['rightClickXY'] = 3;            
    $command_def['rightClickUnit'] = 4;            
    $command_def['train'] = 5;            
    $command_def['build'] = 6;            
    $command_def['buildAddon'] = 7;            
    $command_def['research'] = 8;            
    $command_def['upgrade'] = 9;            
    $command_def['stop'] = 10;            
    $command_def['holdPosition'] = 11;            
    $command_def['patrol'] = 12;            
    $command_def['follow'] = 13;            
    $command_def['setRallyPosition'] = 14;            
    $command_def['setRallyUnit'] = 15;            
    $command_def['repair'] = 16;            
    $command_def['morph'] = 17;            
    $command_def['burrow'] = 18;            
    $command_def['unburrow'] = 19;            
    $command_def['siege'] = 20;            
    $command_def['unsiege'] = 21;            
    $command_def['cloak'] = 22;            
    $command_def['decloak'] = 23;            
    $command_def['lift'] = 24;            
    $command_def['land'] = 25;            
    $command_def['load'] = 26;            
    $command_def['unload'] = 27;            
    $command_def['unloadAll'] = 28;            
    $command_def['unloadAllXY'] = 29;            
    $command_def['cancelConstruction'] = 30;            
    $command_def['haltConstruction'] = 31;            
    $command_def['cancelMorph'] = 32;            
    $command_def['cancelTrain'] = 33;            
    $command_def['cancelTrainSlot'] = 34;            
    $command_def['cancelAddon'] = 35;            
    $command_def['cancelResearch'] = 36;            
    $command_def['cancelUpgrade'] = 37;            
    $command_def['useTech'] = 38;            
    $command_def['useTechXY'] = 39;            
    $command_def['useTechUnit'] = 40;

    $order_def['Die'] = 0;
    $order_def['Stop'] = 1;
    $order_def['Guard'] = 2;
    $order_def['PlayerGuard'] = 3;
    $order_def['TurretGuard'] = 4;
    $order_def['BunkerGuard'] = 5;
    $order_def['Move'] = 6;
    $order_def['ReaverStop'] = 7;
    $order_def['Attack1'] = 8;
    $order_def['Attack2'] = 9;
    $order_def['AttackUnit'] = 10;
    $order_def['AttackFixedRange'] = 11;
    $order_def['AttackTile'] = 12;
    $order_def['Hover'] = 13;
    $order_def['AttackMove'] = 14;
    $order_def['InfestMine1'] = 15;
    $order_def['Nothing1'] = 16;
    $order_def['Powerup1'] = 17;
    $order_def['TowerGuard'] = 18;
    $order_def['TowerAttack'] = 19;
    $order_def['VultureMine'] = 20;
    $order_def['StayinRange'] = 21;
    $order_def['TurretAttack'] = 22;
    $order_def['Nothing2'] = 23;
    $order_def['Nothing3'] = 24;
    $order_def['DroneStartBuild'] = 25;
    $order_def['DroneBuild'] = 26;
    $order_def['InfestMine2'] = 27;
    $order_def['InfestMine3'] = 28;
    $order_def['InfestMine4'] = 29;
    $order_def['BuildTerran'] = 30;
    $order_def['BuildProtoss1'] = 31;
    $order_def['BuildProtoss2'] = 32;
    $order_def['ConstructingBuilding'] = 33;
    $order_def['Repair1'] = 34;
    $order_def['Repair2'] = 35;
    $order_def['PlaceAddon'] = 36;
    $order_def['BuildAddon'] = 37;
    $order_def['Train'] = 38;
    $order_def['RallyPoint1'] = 39;
    $order_def['RallyPoint2'] = 40;
    $order_def['ZergBirth'] = 41;
    $order_def['Morph1'] = 42;
    $order_def['Morph2'] = 43;
    $order_def['BuildSelf1'] = 44;
    $order_def['ZergBuildSelf'] = 45;
    $order_def['Build5'] = 46;
    $order_def['Enternyduscanal'] = 47;
    $order_def['BuildSelf2'] = 48;
    $order_def['Follow'] = 49;
    $order_def['Carrier'] = 50;
    $order_def['CarrierIgnore1'] = 51;
    $order_def['CarrierStop'] = 52;
    $order_def['CarrierAttack1'] = 53;
    $order_def['CarrierAttack2'] = 54;
    $order_def['CarrierIgnore2'] = 55;
    $order_def['CarrierFight'] = 56;
    $order_def['HoldPosition1'] = 57;
    $order_def['Reaver'] = 58;
    $order_def['ReaverAttack1'] = 59;
    $order_def['ReaverAttack2'] = 60;
    $order_def['ReaverFight'] = 61;
    $order_def['ReaverHold'] = 62;
    $order_def['TrainFighter'] = 63;
    $order_def['StrafeUnit1'] = 64;
    $order_def['StrafeUnit2'] = 65;
    $order_def['RechargeShields1'] = 66;
    $order_def['Rechargeshields2'] = 67;
    $order_def['ShieldBattery'] = 68;
    $order_def['Return'] = 69;
    $order_def['DroneLand'] = 70;
    $order_def['BuildingLand'] = 71;
    $order_def['BuildingLiftoff'] = 72;
    $order_def['DroneLiftoff'] = 73;
    $order_def['Liftoff'] = 74;
    $order_def['ResearchTech'] = 75;
    $order_def['Upgrade'] = 76;
    $order_def['Larva'] = 77;
    $order_def['SpawningLarva'] = 78;
    $order_def['Harvest1'] = 79;
    $order_def['Harvest2'] = 80;
    $order_def['MoveToGas'] = 81;
    $order_def['WaitForGas'] = 82;
    $order_def['HarvestGas'] = 83;
    $order_def['ReturnGas'] = 84;
    $order_def['MoveToMinerals'] = 85;
    $order_def['WaitForMinerals'] = 86;
    $order_def['MiningMinerals'] = 87;
    $order_def['Harvest3'] = 88;
    $order_def['Harvest4'] = 89;
    $order_def['ReturnMinerals'] = 90;
    $order_def['Harvest5'] = 91;
    $order_def['EnterTransport'] = 92;
    $order_def['Pickup1'] = 93;
    $order_def['Pickup2'] = 94;
    $order_def['Pickup3'] = 95;
    $order_def['Pickup4'] = 96;
    $order_def['Powerup2'] = 97;
    $order_def['SiegeMode'] = 98;
    $order_def['TankMode'] = 99;
    $order_def['WatchTarget'] = 100;
    $order_def['InitCreepGrowth'] = 101;
    $order_def['SpreadCreep'] = 102;
    $order_def['StoppingCreepGrowth'] = 103;
    $order_def['GuardianAspect'] = 104;
    $order_def['WarpingArchon'] = 105;
    $order_def['CompletingArchonsummon'] = 106;
    $order_def['HoldPosition2'] = 107;
    $order_def['HoldPosition3'] = 108;
    $order_def['Cloak'] = 109;
    $order_def['Decloak'] = 110;
    $order_def['Unload'] = 111;
    $order_def['MoveUnload'] = 112;
    $order_def['FireYamatoGun1'] = 113;
    $order_def['FireYamatoGun2'] = 114;
    $order_def['MagnaPulse'] = 115;
    $order_def['Burrow'] = 116;
    $order_def['Burrowed'] = 117;
    $order_def['Unburrow'] = 118;
    $order_def['DarkSwarm'] = 119;
    $order_def['CastParasite'] = 120;
    $order_def['SummonBroodlings'] = 121;
    $order_def['EmpShockwave'] = 122;
    $order_def['NukeWait'] = 123;
    $order_def['NukeTrain'] = 124;
    $order_def['NukeLaunch'] = 125;
    $order_def['NukePaint'] = 126;
    $order_def['NukeUnit'] = 127;
    $order_def['NukeGround'] = 128;
    $order_def['NukeTrack'] = 129;
    $order_def['InitArbiter'] = 130;
    $order_def['CloakNearbyUnits'] = 131;
    $order_def['PlaceMine'] = 132;
    $order_def['Rightclickaction'] = 133;
    $order_def['SapUnit'] = 134;
    $order_def['SapLocation'] = 135;
    $order_def['HoldPosition4'] = 136;
    $order_def['Teleport'] = 137;
    $order_def['TeleporttoLocation'] = 138;
    $order_def['PlaceScanner'] = 139;
    $order_def['Scanner'] = 140;
    $order_def['DefensiveMatrix'] = 141;
    $order_def['PsiStorm'] = 142;
    $order_def['Irradiate'] = 143;
    $order_def['Plague'] = 144;
    $order_def['Consume'] = 145;
    $order_def['Ensnare'] = 146;
    $order_def['StasisField'] = 147;
    $order_def['Hallucination1'] = 148;
    $order_def['Hallucination2'] = 149;
    $order_def['ResetCollision1'] = 150;
    $order_def['ResetCollision2'] = 151;
    $order_def['Patrol'] = 152;
    $order_def['CTFCOPInit'] = 153;
    $order_def['CTFCOP1'] = 154;
    $order_def['CTFCOP2'] = 155;
    $order_def['ComputerAI'] = 156;
    $order_def['AtkMoveEP'] = 157;
    $order_def['HarassMove'] = 158;
    $order_def['AIPatrol'] = 159;
    $order_def['GuardPost'] = 160;
    $order_def['RescuePassive'] = 161;
    $order_def['Neutral'] = 162;
    $order_def['ComputerReturn'] = 163;
    $order_def['InitPsiProvider'] = 164;
    $order_def['SelfDestrucing'] = 165;
    $order_def['Critter'] = 166;
    $order_def['HiddenGun'] = 167;
    $order_def['OpenDoor'] = 168;
    $order_def['CloseDoor'] = 169;
    $order_def['HideTrap'] = 170;
    $order_def['RevealTrap'] = 171;
    $order_def['Enabledoodad'] = 172;
    $order_def['Disabledoodad'] = 173;
    $order_def['Warpin'] = 174;
    $order_def['Medic'] = 175;
    $order_def['MedicHeal1'] = 176;
    $order_def['HealMove'] = 177;
    $order_def['MedicHoldPosition'] = 178;
    $order_def['MedicHeal2'] = 179;
    $order_def['Restoration'] = 180;
    $order_def['CastDisruptionWeb'] = 181;
    $order_def['CastMindControl'] = 182;
    $order_def['WarpingDarkArchon'] = 183;
    $order_def['CastFeedback'] = 184;
    $order_def['CastOpticalFlare'] = 185;
    $order_def['CastMaelstrom'] = 186;
    $order_def['JunkYardDog'] = 187;
    $order_def['Fatal'] = 188;
    $order_def['None'] = 189;
    $order_def['Unknown'] = 190;
?>