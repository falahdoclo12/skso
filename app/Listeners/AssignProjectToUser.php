<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use App\Notifications\NewProjectNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignProjectToUser implements ShouldQueue
{
    public function handle(ProjectCreated $event)
    {
        $project = $event->project;
        // Assign the project to a user account based on the user_id
        $user = $project->user;
        $user->projects()->save($project);

        //send notification to the user
        $user->notify(new NewProjectNotification($project));
    }
}
