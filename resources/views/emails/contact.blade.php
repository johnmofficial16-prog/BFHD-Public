<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #9333ea 0%, #ec4899 100%);
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f9fafb;
            padding: 30px;
            border: 1px solid #e5e7eb;
            border-top: none;
        }
        .field {
            margin-bottom: 20px;
        }
        .label {
            font-weight: bold;
            color: #9333ea;
            margin-bottom: 5px;
        }
        .value {
            padding: 10px;
            background: white;
            border-left: 3px solid #9333ea;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="margin: 0;">New Contact Form Submission</h2>
            <p style="margin: 5px 0 0 0; opacity: 0.9;">BestFlightHotelDeals.com</p>
        </div>
        <div class="content">
            <div class="field">
                <div class="label">Name:</div>
                <div class="value">{{ $contactData['name'] }}</div>
            </div>

            <div class="field">
                <div class="label">Email:</div>
                <div class="value">{{ $contactData['email'] }}</div>
            </div>

            <div class="field">
                <div class="label">Subject:</div>
                <div class="value">{{ $contactData['subject'] }}</div>
            </div>

            <div class="field">
                <div class="label">Message:</div>
                <div class="value">{{ $contactData['message'] }}</div>
            </div>

            <p style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; color: #6b7280; font-size: 14px;">
                Submitted on: {{ now()->format('F j, Y g:i A') }}
            </p>
        </div>
    </div>
</body>
</html>
