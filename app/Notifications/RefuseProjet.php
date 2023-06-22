<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RefuseProjet extends Notification
{
    use Queueable;
    private $projet;
    private $raison;
    /**
     * Create a new notification instance.
     */
    public function __construct($projet,$raison)
    {
     $this->projet=$projet;
     $this->$raison=$raison;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $titre=$this->projet->titre;
        $iduser=$this->projet->porteur->user->id;
        $username=$this->projet->porteur->user->nom;
        $useremail=$this->projet->porteur->user->email;
        return [
             'titre'=>$titre,
             'iduser'=>$iduser,
             'nom'=>$username,
             'email'=>$useremail,
             'idProjet'=>$this->projet->id,
             'idNotification'=>$this->id,
              'raison'=>$this->raison,
               'is_accept'=>false  ];
    }
}
