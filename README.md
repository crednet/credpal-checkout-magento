# credpal-checkout-magento
CredPal BNPL(Buy Now Pay Later) Checkout Plugin For Magento

## Installation
**For installation kindly Follow the bellow steps:**

1. Extract the ZIP-file locally and inspect the contents
we will have a ZIP-file called CredPal_CredPalPay.zip which contains a module
name CredPalPay. The first step is to extract all files contained within the ZIP-file to
local.

2. Uploading all files to the Magento filesystem
Now you're ready to upload all files to the Magento root-filesystem. When you have
SSH or SFTP available, it is best to use that - it gives you a secure encrypted
connection to your Magento server. Alternatively use FTP or control panels like
CPanel or DirectAdmin.
Kindly follow the below folder structure for copying the content of the extracted Zip
File.
Root magento installation directory /app/code/CredPal/CredPalPay

3. Enable the Module
In this step, we will enable the module with help of Magento CLI (command-line
interface)

`bin/magento module:enable CredPal_CredPalPay`

4. We will check if the CredPalPay module is enabled by the following command

`bin/magento module:status CredPal_CredPalPay`

Expected response:
`Module is enabled`
It's recommended using the below command.

`bin/magento setup:upgrade`

Step 4: Clear The Cache
Clear the cache of Magento with help of Magento CLI 

`bin/magento cache:clean`

5. Magento Code compiler
In this step, with the help of the Magento code Compiler, we will compile the
CredPalPay Code.

`bin/magento setup:di:compile`

Expected response:
Generated code and dependency injection configuration successfully.

6. Deploy static view files
*Static* means it can be cached for a site (that is, the file is not dynamically
generated).
*View* refers to presentation layer (from MVC). 

`bin/magento setup:static-content:deploy`

Expected response:
Successful: XXXXXXX files; errors: 0
After completing the above-mentioned steps, the CredPalPay Payment Gateway will
appear under the

Store -> Configuration -> Sales -> Payment Method

Log in to the merchant place on https://retail.credpal.com to get the merchant id
