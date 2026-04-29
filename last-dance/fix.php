<?php
$users = App\Models\User::whereNotNull('image')->get();
foreach($users as $user) {
    if (strpos($user->image, '/') === false) {
        $user->image = 'images/' . $user->image;
        $user->save();
    }
}
echo "Done fixing images.";
