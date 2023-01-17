@extends('layouts.app')
@section('content')



<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
<style>
.custom-control-label::before {
    left: 0.9rem !important;
	
	}
	
	.custom-control-label::after {
    left: 0.9rem !important;
	}

</style>

</head>



<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permission</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('role')}}">Role</a></li>
                    <li class="breadcrumb-item active">Permission</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{route('role')}}">Role</a>  -  {{ @$rolename->role_name }}
                            </h3>
                    </div>
                    <div class="card-body p-0">
                        <form method="POST" action="{{route('permissionadd')}}">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="5">
                                            <div class="col text-right">
                                                <select name="role"  hidden class="btn btn-secondary dropdown-toggle">
                                                    <option disabled="disabled" selected="selected">Role</option>
                                                    <option value="1" @if(@$role == "1") selected @endif>SuperAdmin</option>
                                                    <option value="2" @if(@$role == "2") selected @endif>Admin</option>
                                                    <option value="3" @if(@$role == "3") selected @endif>Restaurants</option>
                                                    <option value="4" @if(@$role == "4") selected @endif>DeliveryBoy</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Menu</th>
                                        <th>IsView</th>
                                        <th>IsAdd</th>
                                        <th>IsEdit</th>
                                        <th>IsDelete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Slider</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-sliderview"
                                                name="data[sliderview]" type="checkbox" @if(@$permisstion->sliderview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-sliderview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-slideradd"
                                                name="data[slideradd]" type="checkbox"  @if(@$permisstion->slideradd == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-slideradd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-slideredit"
                                                name="data[slideredit]" type="checkbox"  @if(@$permisstion->slideredit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-slideredit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-sliderdelete"
                                                name="data[sliderdelete]" type="checkbox"  @if(@$permisstion->sliderdelete == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-sliderdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Permission</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-roleview"
                                                name="data[roleview]" type="checkbox" @if(@$permisstion->roleview == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-roleview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-roleadd"
                                                name="data[roleadd]" type="checkbox" @if(@$permisstion->roleadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-roleadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-roleedit"
                                                name="data[roleedit]" type="checkbox" @if(@$permisstion->roleedit == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-roleedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-roledelete"
                                                name="data[roledelete]" type="checkbox" @if(@$permisstion->roledelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-roledelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>System User</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-systemuserview"
                                                name="data[systemuserview]" type="checkbox" @if(@$permisstion->systemuserview == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-systemuserview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-systemuseradd"
                                                name="data[systemuseradd]" type="checkbox" @if(@$permisstion->systemuseradd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-systemuseradd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-systemuseredit"
                                                name="data[systemuseredit]" type="checkbox" @if(@$permisstion->systemuseredit == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-systemuseredit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-systemuserdelete"
                                                name="data[systemuserdelete]" type="checkbox" @if(@$permisstion->systemuserdelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-systemuserdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Ticket</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-ticketview"
                                                name="data[ticketview]" type="checkbox"  @if(@$permisstion->ticketview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-ticketview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-ticketadd"
                                                name="data[ticketadd]" type="checkbox"   @if(@$permisstion->ticketadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-ticketadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-ticketedit"
                                                name="data[ticketedit]" type="checkbox"  @if(@$permisstion->ticketedit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-ticketedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-ticketdelete"
                                                name="data[ticketdelete]" type="checkbox"  @if(@$permisstion->ticketdelete == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-ticketdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Promo Code</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-promocodeview"
                                                name="data[promocodeview]" type="checkbox"  @if(@$permisstion->promocodeview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-promocodeview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-promocodeadd"
                                                name="data[promocodeadd]" type="checkbox"   @if(@$permisstion->promocodeadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-promocodeadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-promocodeedit"
                                                name="data[promocodeedit]" type="checkbox"  @if(@$permisstion->promocodeedit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-promocodeedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-promocodedelete"
                                                name="data[promocodedelete]" type="checkbox"  @if(@$permisstion->promocodedelete == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-promocodedelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Faq</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-faqview"
                                                name="data[faqview]" type="checkbox" @if(@$permisstion->faqview == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-faqview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-faqadd"
                                                name="data[faqadd]" type="checkbox" @if(@$permisstion->faqadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-faqadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-faqedit"
                                                name="data[faqedit]" type="checkbox" @if(@$permisstion->faqedit == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-faqedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-faqdelete"
                                                name="data[faqdelete]" type="checkbox" @if(@$permisstion->faqdelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-faqdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Category</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-categoryview"
                                                name="data[categoryview]" type="checkbox" @if(@$permisstion->categoryview == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-categoryview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-categoryadd"
                                                name="data[categoryadd]" type="checkbox" @if(@$permisstion->categoryadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-categoryadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-categoryedit"
                                                name="data[categoryedit]" type="checkbox" @if(@$permisstion->categoryedit == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-categoryedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-categorydelete"
                                                name="data[categorydelete]" type="checkbox" @if(@$permisstion->categorydelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-categorydelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Attributes</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-attributesview"
                                                name="data[attributesview]" type="checkbox" @if(@$permisstion->attributesview == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-attributesview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-attributesadd"
                                                name="data[attributesadd]" type="checkbox" @if(@$permisstion->attributesadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-attributesadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-attributesedit"
                                                name="data[attributesedit]" type="checkbox" @if(@$permisstion->attributesedit == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-attributesedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-attributesdelete"
                                                name="data[attributesdelete]" type="checkbox" @if(@$permisstion->attributesdelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-attributesdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tax</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-taxview"
                                                name="data[taxview]" type="checkbox" @if(@$permisstion->taxview == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-taxview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-taxadd"
                                                name="data[taxadd]" type="checkbox" @if(@$permisstion->taxadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-taxadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-taxedit"
                                                name="data[taxedit]" type="checkbox" @if(@$permisstion->taxedit == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-taxedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-taxdelete"
                                                name="data[taxdelete]" type="checkbox" @if(@$permisstion->taxdelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-taxdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Partner</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-partnerview"
                                                name="data[partnerview]" type="checkbox" @if(@$permisstion->partnerview == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-partnerview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-partneradd"
                                                name="data[partneradd]" type="checkbox" @if(@$permisstion->partneradd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-partneradd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-partneredit"
                                                name="data[partneredit]" type="checkbox" @if(@$permisstion->partneredit == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-partneredit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-partnerdelete"
                                                name="data[partnerdelete]" type="checkbox" @if(@$permisstion->partnerdelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-partnerdelete"></label>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Waiter</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-waiterview"
                                                name="data[waiterview]" type="checkbox" @if(@$permisstion->waiterview == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-waiterview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-waiteradd"
                                                name="data[waiteradd]" type="checkbox" @if(@$permisstion->waiteradd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-waiteradd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-waiteredit"
                                                name="data[waiteredit]" type="checkbox" @if(@$permisstion->waiteredit == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-waiteredit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-waiterdelete"
                                                name="data[waiterdelete]" type="checkbox" @if(@$permisstion->waiterdelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-waiterdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Cms</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-cmsview"
                                                name="data[cmsview]" type="checkbox" @if(@$permisstion->cmsview == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-cmsview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-cmsadd"
                                                name="data[cmsadd]" type="checkbox" @if(@$permisstion->cmsadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-cmsadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-cmsedit"
                                                name="data[cmsedit]" type="checkbox" @if(@$permisstion->cmsedit == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-cmsedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-cmsdelete"
                                                name="data[cmsdelete]" type="checkbox" @if(@$permisstion->cmsdelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-cmsdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>General Setting</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-generalsettingview"
                                                name="data[generalsettingview]" type="checkbox" @if(@$permisstion->generalsettingview == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-generalsettingview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-generalsettingadd"
                                                name="data[generalsettingadd]" type="checkbox" @if(@$permisstion->generalsettingadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-generalsettingadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-generalsettingedit"
                                                name="data[generalsettingedit]" type="checkbox" @if(@$permisstion->generalsettingedit == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-generalsettingedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-generalsettingdelete"
                                                name="data[generalsettingdelete]" type="checkbox" @if(@$permisstion->generalsettingdelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-generalsettingdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Firebase Setting</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-firebaseview"
                                                name="data[firebaseview]" type="checkbox"  @if(@$permisstion->firebaseview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-firebaseview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-firebaseadd"
                                                name="data[firebaseadd]" type="checkbox"   @if(@$permisstion->firebaseadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-firebaseadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-firebaseedit"
                                                name="data[firebaseedit]" type="checkbox"  @if(@$permisstion->firebaseedit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-firebaseedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-firebasedelete"
                                                name="data[firebasedelete]" type="checkbox"  @if(@$permisstion->firebasedelete == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-firebasedelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Offers Management</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-offerview"
                                                name="data[offerview]" type="checkbox"  @if(@$permisstion->offerview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-offerview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-offeradd"
                                                name="data[offeradd]" type="checkbox"   @if(@$permisstion->offeradd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-offeradd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-offeredit"
                                                name="data[offeredit]" type="checkbox"  @if(@$permisstion->offeredit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-offeredit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-offerdelete"
                                                name="data[offerdelete]" type="checkbox"  @if(@$permisstion->offerdelete == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-offerdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tag</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-tagview"
                                                name="data[tagview]" type="checkbox"  @if(@$permisstion->tagview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-tagview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-tagadd"
                                                name="data[tagadd]" type="checkbox"   @if(@$permisstion->tagadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-tagadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-tagedit"
                                                name="data[tagedit]" type="checkbox"  @if(@$permisstion->tagedit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-tagedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-tagdelete"
                                            name="data[tagdelete]" type="checkbox"  @if(@$permisstion->tagdelete == "on") checked @endif  />
                                        <label class="custom-control-label" for="checkbox-tagdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Addons</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-addonsview"
                                                name="data[addonsview]" type="checkbox"  @if(@$permisstion->addonsview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-addonsview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-addonsadd"
                                                name="data[addonsadd]" type="checkbox"   @if(@$permisstion->addonsadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-addonsadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-addonsedit"
                                                name="data[addonsedit]" type="checkbox"  @if(@$permisstion->addonsedit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-addonsedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-addonsdelete"
                                                name="data[addonsdelete]" type="checkbox"  @if(@$permisstion->addonsdelete == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-addonsdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Send Notification</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-notificationview"
                                                name="data[notificationview]" type="checkbox"  @if(@$permisstion->notificationview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-notificationview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-notificationadd"
                                                name="data[notificationadd]" type="checkbox"   @if(@$permisstion->notificationadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-notificationadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-notificationedit"
                                                name="data[notificationedit]" type="checkbox"  @if(@$permisstion->notificationedit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-notificationedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-notificationdelete"
                                                name="data[notificationdelete]" type="checkbox"  @if(@$permisstion->notificationdelete == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-notificationdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Feature</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-featuredview"
                                                name="data[featuredview]" type="checkbox"  @if(@$permisstion->featuredview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-featuredview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-featuredadd"
                                                name="data[featuredadd]" type="checkbox"   @if(@$permisstion->featuredadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-featuredadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-featurededit"
                                                name="data[featurededit]" type="checkbox"  @if(@$permisstion->featurededit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-featurededit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-featureddelete"
                                                name="data[featureddelete]" type="checkbox" @if(@$permisstion->featureddelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-featureddelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Product</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-productview"
                                                name="data[productview]" type="checkbox"  @if(@$permisstion->productview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-productview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-productadd"
                                                name="data[productadd]" type="checkbox"   @if(@$permisstion->productadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-productadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-productedit"
                                                name="data[productedit]" type="checkbox"  @if(@$permisstion->productedit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-productedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-productdelete"
                                                name="data[productdelete]" type="checkbox" @if(@$permisstion->productdelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-productdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Email Smtp</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-emailsmtpview"
                                                name="data[emailsmtpview]" type="checkbox"  @if(@$permisstion->emailsmtpview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-emailsmtpview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-emailsmtpadd"
                                                name="data[emailsmtpadd]" type="checkbox"   @if(@$permisstion->emailsmtpadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-emailsmtpadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-emailsmtpedit"
                                                name="data[emailsmtpedit]" type="checkbox"  @if(@$permisstion->emailsmtpedit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-emailsmtpedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-emailsmtpdelete"
                                                name="data[emailsmtpdelete]" type="checkbox" @if(@$permisstion->emailsmtpdelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-emailsmtpdelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Paymentmethod</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-paymentmethodview"
                                                name="data[paymentmethodview]" type="checkbox"  @if(@$permisstion->paymentmethodview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-paymentmethodview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-paymentmethodadd"
                                                name="data[paymentmethodadd]" type="checkbox"   @if(@$permisstion->paymentmethodadd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-paymentmethodadd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-paymentmethodedit"
                                                name="data[paymentmethodedit]" type="checkbox"  @if(@$permisstion->paymentmethodedit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-paymentmethodedit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-paymentmethoddelete"
                                                name="data[paymentmethoddelete]" type="checkbox" @if(@$permisstion->paymentmethoddelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-paymentmethoddelete"></label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Delivery Boy</td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input " id="checkbox-riderview"
                                                name="data[riderview]" type="checkbox"  @if(@$permisstion->riderview == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-riderview"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-rideradd"
                                                name="data[rideradd]" type="checkbox"   @if(@$permisstion->rideradd == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-rideradd"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-rideredit"
                                                name="data[rideredit]" type="checkbox"  @if(@$permisstion->rideredit == "on") checked @endif  />
                                            <label class="custom-control-label" for="checkbox-rideredit"></label>
                                        </td>
                                        <td class="custom-checkbox">
                                            <input class="custom-control-input" id="checkbox-riderdelete"
                                                name="data[riderdelete]" type="checkbox" @if(@$permisstion->riderdelete == "on") checked @endif />
                                            <label class="custom-control-label" for="checkbox-riderdelete"></label>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                            <div class="card-footer ">
                        <button class="btn btn-primary">submit</button>
                        <a href="{{route('role')}}" <button type="button" class="btn btn-outline-secondary">Back</button> </a>
                    </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    </div>
    </div>
</section>
@endsection
