Credential-Template.php has the template for the credentials to the database
DBConnection-Function.php contains the helper function which will establish a connection to the database

img folder contains the default user profile picture

files that handle profile picture handling
{
upload.php
pfpupdater.php
}

Files which handle sign in and log in
{
landing.php
landing.css
log.php
mid.php : a middle file for data handling between dashboard and both log in/sign up
mid.html
mid.css
sign.php
sign_log.css
PHP_Hashing.php : handles salting and hashing of user/password and password/user validation
registering.js : helps handle file navigation
}

Files that handle dashboard
{
dashboard.html
dashboard.js
dash.css
dashboard.php
deadline_checking.php
time_change.php : Handles the retrieval of tasks to display and removal of tasks.
}

Files that handle settings page
{
AIstyle.css
AccInfo_Style.css
NewsStyle.css
NotifStyle.css
Settings-Functions.php
acc_info.js
change_password.css
change_password.php
change_password.html
news.html
news.php
notifications.html
settings_AccInfo.html
settings_AccInfo.php
notifsRetrieveTasks.php
}

Files that handle task handling
{
SubmitTask.php
UserTaskStorage.php
edit-tasks.css
edit-tasks.html
edit-tasks.php
edit-tasks.js
occur-get.php
recurrence-updating.php
}

Files that handle friends {
FriendsToDatabase.php
SubmitFriend.php
friends-get.php
friends.css
friends.html
friends.js
friends.php
}

File that handle dark mode functionality {
ModifyDarkModeState.php
Notifsytledark.css
dash-dark.css
changepassworddark.css
edit-taskdark.css
friends-dark.css
landingdark.css
switchmode.php
themechanger.php
}
