<!DOCTYPE html>
<html>
<head>
    <title>Blackpeach Consulting Admin Login</title>
</head>
<body style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
    <div style="background: #f8f9fa; padding: 40px 20px;">
        <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
            <h1 style="color: #1e293b; font-size: 24px; margin-bottom: 20px;">Blackpeach Consulting Admin Login</h1>
            <p style="color: #475569; line-height: 1.6;">Your one-time login code is:</p>
            
            <div style="background: #3b82f6; color: white; font-size: 36px; font-weight: bold; letter-spacing: 8px; 
                        text-align: center; padding: 20px; border-radius: 8px; margin: 30px 0;">
                {{ $otp }}
            </div>
            
            <p style="color: #475569; font-size: 14px;">
                This code expires in <strong>3 minutes</strong>. 
                Do not share this code with anyone.
            </p>
            
            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 30px 0;">
            <p style="color: #64748b; font-size: 12px;">
                Blackpeach Consulting Admin Portal<br>
                portal.blackpeach.co.za
            </p>
        </div>
    </div>
</body>
</html>
