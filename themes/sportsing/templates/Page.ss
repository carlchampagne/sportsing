<h1>Silverstripe Recruitment Exercise</h1>
<h3>Write functions that will:</h3>

<strong>Find the All Blacks team from the database, and then present whether it’s regional or national, it’s colour, mascot, the season they play, and then a list of the players.</strong>

<% with $TeamDetails('All Blacks') %>
    <p>
    <% if $Name != 'TeamDetails' %>
        Team: $Name ($Scope)<br />
        Colour: $TeamColour.Title<br />
        <% if $MascotName %>Mascot: $MascotName<br /><% end_if %>
        Season: $Sport.Season<br />

        Players:
        <ul>
        <% loop $Sportsmen %>
            <li>$FirstName $LastName</li>
        <% end_loop %>
        </ul>
    <% else %>
        Nothing found. Try <a href='/dev/tasks/ImportTestDataTask' target="_blank">running the test data build task</a> and refresh
    <% end_if %>
    </p>
<% end_with %>

<strong>Find Jeff Wilson and show the teams he plays in, along with the season that the teams play and if the team is national or regional.</strong>

<% with $SportsmanDetails('Jeff', 'Wilson') %>
    <p>
    <% if $FirstName %>
        Name: $FirstName $LastName<br />
        Teams:
        <ul>
        <% loop $Teams %>
            <li>$Name ($Scope) - $Sport.Season</li>
        <% end_loop %>
        </ul>
    <% else %>
        Nothing found. Try <a href='/dev/tasks/ImportTestDataTask' target="_blank">running the test data build task</a> and refresh
    <% end_if %>
    </p>
<% end_with %>
