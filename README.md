<h2>Task Description</h2>
<p>A todo list where user can add and see date and time of tasks according to there timezone</p>
<h3>Approach</h3>
<p>First of all we get user's local timezone either from browser via jsavascript or from ip adderess at server side and store it in session, whenever user adds a new todo we convert his scheduled time to utc time format and save it in database in utc format</p>
<br/>
<p>While fetching/displaying the records we convert utc time to user's local timezone that we have stored in session for now</p>

<br/>
If you want to get timezone from localmachine you can uncomment  getLocalTimeZone(); method in todos.blade.php file

```
 getLocalTimeZone();
```


By default we get timezone from ip address and using geoplugin service to get timezone

```
 $user_ip = $_SERVER['REMOTE_ADDR'];
 $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
 $timezone = $geo["geoplugin_timezone"];
 session(['local_timezone' => $timezone]);
```

