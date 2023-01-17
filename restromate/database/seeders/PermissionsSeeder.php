<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'id' => 1,
            'role_id' => 1,
            'permissiondata'=>'{
                "cmsadd": "on",
                "faqadd": "on",
                "tagadd": "on",
                "taxadd": "on",
                "cmsedit": "on",
                "cmsview": "on",
                "faqedit": "on",
                "faqview": "on",
                "roleadd": "on",
                "tagedit": "on",
                "tagview": "on",
                "taxedit": "on",
                "taxview": "on",
                "offeradd": "on",
                "rideradd": "on",
                "roleedit": "on",
                "roleview": "on",
                "addonsadd": "on",
                "cmsdelete": "on",
                "faqdelete": "on",
                "offeredit": "on",
                "offerview": "on",
                "rideredit": "on",
                "riderview": "on",
                "slideradd": "on",
                "tagdelete": "on",
                "taxdelete": "on",
                "ticketadd": "on",
                "waiteradd": "on",
                "addonsedit": "on",
                "addonsview": "on",
                "partneradd": "on",
                "productadd": "on",
                "roledelete": "on",
                "slideredit": "on",
                "sliderview": "on",
                "ticketedit": "on",
                "ticketview": "on",
                "waiteredit": "on",
                "waiterview": "on",
                "categoryadd": "on",
                "featuredadd": "on",
                "firebaseadd": "on",
                "offerdelete": "on",
                "partneredit": "on",
                "partnerview": "on",
                "productedit": "on",
                "productview": "on",
                "riderdelete": "on",
                "addonsdelete": "on",
                "categoryedit": "on",
                "categoryview": "on",
                "emailsmtpadd": "on",
                "featurededit": "on",
                "featuredview": "on",
                "firebaseedit": "on",
                "firebaseview": "on",
                "promocodeadd": "on",
                "sliderdelete": "on",
                "ticketdelete": "on",
                "waiterdelete": "on",
                "attributesadd": "on",
                "emailsmtpedit": "on",
                "emailsmtpview": "on",
                "partnerdelete": "on",
                "productdelete": "on",
                "promocodeedit": "on",
                "promocodeview": "on",
                "systemuseradd": "on",
                "attributesedit": "on",
                "attributesview": "on",
                "categorydelete": "on",
                "featureddelete": "on",
                "firebasedelete": "on",
                "systemuseredit": "on",
                "systemuserview": "on",
                "emailsmtpdelete": "on",
                "notificationadd": "on",
                "promocodedelete": "on",
                "attributesdelete": "on",
                "notificationedit": "on",
                "notificationview": "on",
                "paymentmethodadd": "on",
                "systemuserdelete": "on",
                "generalsettingadd": "on",
                "paymentmethodedit": "on",
                "paymentmethodview": "on",
                "generalsettingedit": "on",
                "generalsettingview": "on",
                "notificationdelete": "on",
                "paymentmethoddelete": "on",
                "generalsettingdelete": "on"
            }',
                'createdby' => 1,
        ]);

    }
}
