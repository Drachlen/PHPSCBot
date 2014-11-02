PHPSCBot
========

Bot for StarCraft written in PHP:

This is the basic framework for an AI that plays StarCraft.

This bot in its current state will find idle workers and issue commands for them to harvest minerals.

How it works:
=========
The PHP script runs in a command line. It connects via a socket to the BWAPI, which is a DLL that is injected into the running StarCraft process.

BWAPI and the bot communicate back and forth over the socket.

The script interprets the data based on the BWAPI protocol and issues commands back through the socket to be executed inside the game itself.

BWAPI:
=========
Information on the API can be found here:

https://code.google.com/p/bwapi/

https://github.com/bwapi/bwapi

