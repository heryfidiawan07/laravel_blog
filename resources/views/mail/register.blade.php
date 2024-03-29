<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php

$style = [
    /* Layout ------------------------------ */
    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',

    /* Masthead ----------------------- */

    'email-masthead' => 'padding: 25px 0; text-align: center; background-color: #a18cd1;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #ffffff; text-decoration: none; text-shadow: 0 1px 0 white;',

    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',

    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #000000; padding: 35px; text-align: center;',

    /* Body ------------------------------ */

    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',

    /* Type ------------------------------ */

    'anchor' => 'color: #3869D4;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',

    /* Buttons ------------------------------ */

    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',

    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
];
?>

<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td style="{{ $style['email-wrapper'] }}" align="center">
        <table width="100%" cellpadding="0" cellspacing="0">
          <!-- Logo -->
          <tr>
            <td style="{{ $style['email-masthead'] }}">
              <a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ config('app.url') }}" target="_blank">
                  {{ config('app.name') }}
              </a>
            </td>
          </tr>
  <!-- Email Body -->
  <tr>
    <td style="{{ $style['email-body'] }}" width="100%">
      <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
          <tr>
            <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                <!-- Greeting -->
              <h1 style="{{ $style['header-1'] }}">
                Hello {{$user->name}}
              </h1>
              <!-- Intro -->
              <p style="{{ $style['paragraph'] }}">
                Please click the button below to verify your email address.
              </p>
          <!-- Action Button -->
              <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
                    <?php
                      $actionColor = 'button--blue';
                    ?>
                    <a href="{{ config('app.url') }}/verify/{{$user->token}}/{{$user->id}}"
                      style="{{ $fontFamily }} {{ $style['button'] }} {{ $style[$actionColor] }}"
                      class="button"
                      target="_blank">
                      Verify Email Address
                    </a>
                  </td>
                </tr>
              </table>
          <!-- Outro -->
              <p style="{{ $style['paragraph'] }}">
                If you did not create an account, no further action is required.
              </p>
          <!-- Salutation -->
              <p style="{{ $style['paragraph'] }}">
                Regards,
                <br>
                {{ config('app.name') }}
              </p>
          <!-- Sub Copy -->
              <table style="{{ $style['body_sub'] }}">
                <tr>
                  <td style="{{ $fontFamily }}">
                    <p style="{{ $style['paragraph-sub'] }}">
						If you’re having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser.
                    </p>
                    <p style="{{ $style['paragraph-sub'] }}">
                      <a style="{{ $style['anchor'] }}" href="{{ config('app.url') }}/verify/{{$user->token}}/{{$user->id}}" target="_blank">
                        {{ config('app.url') }}/verify/{{$user->token}}/{{$user->id}}
                      </a>
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
      </table>
    </td>
  </tr>
  <!-- Email Body -->
          <!-- Footer -->
          <tr>
            <td>
              <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                    <p style="{{ $style['paragraph-sub'] }}">
                      &copy; {{ date('Y') }}
                      <a style="{{ $style['anchor'] }}" href="{{ config('app.url') }}" target="_blank">{{ config('app.name') }}</a>.
                      All rights reserved.
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <!-- Footer -->
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
