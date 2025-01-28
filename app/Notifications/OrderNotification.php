<?php  

namespace App\Notifications;  

use Illuminate\Bus\Queueable;  
use Illuminate\Contracts\Queue\ShouldQueue;  
use Illuminate\Notifications\Messages\MailMessage;  
use Illuminate\Notifications\Notification;  
use App\Models\Cart;  

class OrderNotification extends Notification implements ShouldQueue  
{  
    use Queueable;  

    protected $sessionCart;  
    protected $cart;  

    /**  
     * Create a new notification instance.  
     */  
    public function __construct($sessionCart, Cart $cart)  
    {  
        $this->sessionCart = $sessionCart;  
        $this->cart = $cart;  
    }  

    /**  
     * Get the notification's delivery channels.  
     */  
    public function via(object $notifiable): array  
    {  
        return ['mail'];  
    }  

    /**  
     * Get the mail representation of the notification.  
     */  
    public function toMail(object $notifiable): MailMessage  
    {  
        return (new MailMessage)  
            ->subject('Order Confirmation #' . $this->cart->id)  
            ->view('vendor.notifications.order', [  
                'cart' => $this->cart,  
                'sessionCart' => $this->sessionCart  
            ]);  
    }  

    /**  
     * Get the array representation of the notification.  
     */  
    public function toArray(object $notifiable): array  
    {  
        return [  
            'cart_id' => $this->cart->id,  
            'total_amount' => $this->cart->total_amount,  
            'status' => $this->cart->status,  
        ];  
    }  
}  