<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/





Route::resource("series", "SeriesAPIController");

Route::resource("characters", "CharacterAPIController");

Route::resource("comments", "CommentAPIController");

Route::resource("threads", "ThreadAPIController");

Route::resource("threadCharacters", "ThreadCharacterAPIController");

Route::resource("threadUsers", "ThreadUserAPIController");

Route::resource("users", "UserAPIController");