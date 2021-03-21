<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Role;
use Illuminate\Console\Command;
use Hash;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user for this app. It will have a common user role by default';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $availableRoles = Role::pluck('name', 'name')->toArray();
        $userName = $this->ask('Enter username');
        $userPassword = $this->secret('Enter password');
        $userEmail = $this->ask('Enter email');
        $userRoles = $name = $this->choice(
            'What role do you want to have?',
            $availableRoles,
            array_search('user', $availableRoles),
            $maxAttempts = null,
            $allowMultipleSelections = true
        );


        $this->info("Name: $userName");
        $this->info("Email: $userEmail");
        $this->info("Roles: " . json_encode($userRoles));

        if ($this->confirm("Do you wish to create this user?", true)) {
            // Show a progress bar
            $process = $this->output->createProgressBar(100);

            $newUser = User::create([
                'name' => $userName,
                'email' => $userEmail,
                'password' => Hash::make($userPassword),
            ]);

            // By default, all new users will have 'user' role assigned, but we let the possibility of create a user with different role
            $newUser->roles()->attach(Role::whereIn('name', $userRoles)->orWhere('name', 'user')->get());
            
            // Send email to welcome our new user
            Mail::to($newUser['email'])->send(new WelcomeMail($newUser));

            $this->info("User $userName created successfully!");

            // Finish progres bar 
            $process->finish();
            return json_encode($newUser);
        }

        $this->info("No user has been created");
        return true;
    }
}
