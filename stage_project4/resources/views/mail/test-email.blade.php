<p>Bonjour {{ $name }},</p>

<p>Vous avez reçu une demande d'intervention d'un client. Vous pouvez accepter ou refuser la demande en cliquant sur les liens ci-dessous.</p>

<div style="margin: 30px 0; text-align: center;">
  <a href="{{ $acceptLink }}" style="display: inline-block; padding: 12px 24px; margin: 0 10px; background-color: #28a745; color: white; text-decoration: none; font-weight: bold; border-radius: 5px; font-size: 16px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); transition: all 0.3s ease;">
    Accepter la demande
  </a>
  
  <a href="{{ $declineLink }}" style="display: inline-block; padding: 12px 24px; margin: 0 10px; background-color: #dc3545; color: white; text-decoration: none; font-weight: bold; border-radius: 5px; font-size: 16px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); transition: all 0.3s ease;">
    Refuser la demande
  </a>
</div>

<p style="color: #6c757d; font-size: 14px; text-align: center; margin-top: 30px;">
  Ce message est automatique, merci de ne pas y répondre directement.
</p>