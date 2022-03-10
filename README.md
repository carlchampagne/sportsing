# Silverstripe Recruitment Exercise

## Overview

We have 3 sportsmen that we need to store in SilverStripe. We also need to set up different
teams for the sportsmen. The sportsmen can each belong to more than one team.

Set up a vanilla Silverstripe site and create teams and sportsmen as DataObjects and create
the relationships required.

### Consider the following:
* Martin Crowe plays for the Black Caps which is a national cricket team.
* Frank Bunce plays for the Auckland Blues (a regional rugby team), and the All Blacks (a
national rugby team).
* Jeff Wilson plays for the Wellington Hurricanes (a regional rugby team), the All Blacks
and also plays in the Black Caps.
* Rugby teams need a mascot name (text) and Cricket teams need a logo (image).
* Rugby teams play in Winter and Cricket teams play in Summer.
* Team detail:
  * Each team has a colour. All Blacks & Black Caps are Black, Auckland Blues are
  Blue and the Hurricanes are Yellow. Note more teams and colours could be
  added in the future.
  * Each team has a mascot. The All Blacks mascot name is “Buck Shelford”, the
  Blues is “Blue Beard”, the Hurricanes is “Captain Hurricane”.

### Write functions that will:
* Find the All Blacks team from the database, and then present whether it’s regional or
national, it’s colour, mascot, the season they play, and then a list of the players.
* Find Jeff Wilson and show the teams he plays in, along with the season that the teams
play and if the team is national or regional.

## Installation

```
composer install

Build task:

<your_url>/dev/tasks/ImportTestDataTask
```

## Usage

To keep things simple. I've made a very basic template to show the results of the functions on the default page type.

After running the build task, just load the home page.

## Further Notes and Comments

The data structure includes the ability to have an image for Cricket teams, although it is unused in the data import and output. 

I have included basic admin panels mainly to see the content loaded into the database.

For cleanliness of code and future extensibility, I have given all teams the ability to have both a mascot and a logo regardless of the type of sport.
Additional logic could be added if we wish to hide the mascot name from Cricket and logo from Rugby.
