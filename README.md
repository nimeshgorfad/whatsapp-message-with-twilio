
# WordPress Plugin: WhatsApp Message With Twilio

## Description
This WordPress plugin allows you to send WhatsApp template messages using Twilio's API. It's perfect for businesses looking to automate their WhatsApp communications directly from their WordPress website.

## Features
- Send WhatsApp template messages. 
- Customizable message templates.
- Compatible with WordPress 5.0 and above.

## Requirements
- WordPress 5.0 or higher
- PHP 7.4 or higher
- Twilio account with WhatsApp API access

## Installation
1. Download the plugin files.
2. Upload the plugin folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress. 

## Setup Instructions
1. Obtain your **Account SID**, **Auth Token**, and **WhatsApp Business Number** from your Twilio Console.
2. Enter these credentials into the plugin settings page.
3. Add your approved WhatsApp templates id in function. 

## Usage
### function
Use the following function to send a message:
```php
 nkg_send_whatsapp($number,$contentVariables,$ContentSid)
```
 

## Contributing
We welcome contributions! Feel free to submit issues or pull requests on our [GitHub repository](#).

## License
This project is licensed under the MIT License. See the LICENSE file for details.

## Support
For any questions or issues, please contact nimeshgorfad@gmail.com,https://www.freelancer.in/u/nimeshgorfad
