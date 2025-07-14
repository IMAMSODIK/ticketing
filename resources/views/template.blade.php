<!DOCTYPE html>
<html lang="en" class="h-100">

@include('layouts.head')

<body class="d-flex flex-column h-100">
    <div class="modal fade" id="addorganisationModal" tabindex="-1" aria-labelledby="addorganisationLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addorganisationLabel">Organisation details</h5>
                    <button type="button" class="close-model-btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="uil uil-multiply"></i></button>
                </div>
                <div class="modal-body">
                    <div class="model-content main-form">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group text-center mt-4">
                                    <label class="form-label">Avatar*</label>
                                    <span class="org_design_button btn-file">
                                        <span><i class="fa-solid fa-camera"></i></span>
                                        <input type="file" id="org_avatar" accept="image/*"
                                            name="Organisation_avatar">
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Name*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Profile Link*</label>
                                    <input class="form-control h_40" type="text" placeholder=""
                                        value="https://www.barren.com/b/organiser/" disabled>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">About*</label>
                                    <textarea class="form-textarea" placeholder="">About</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Email*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Phone*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Website*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Facebook*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Instagram*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Twitter*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">LinkedIn*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Youtube*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <h4 class="address-title">Address</h4>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Address 1*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Address 2*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group main-form mt-4">
                                    <label class="form-label">Country*</label>
                                    <select class="selectpicker" data-size="5" title="Nothing selected"
                                        data-live-search="true">
                                        <option value="Algeria">Algeria</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria (Österreich)</option>
                                        <option value="Belgium">Belgium (België)</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Chile">Chile</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Vietnam">Vietnam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">State*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">City/Suburb*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mt-4">
                                    <label class="form-label">Zip/Post Code*</label>
                                    <input class="form-control h_40" type="text" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="co-main-btn min-width btn-hover h_40"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="main-btn min-width btn-hover h_40">Add</button>
                </div>
            </div>
        </div>
    </div>
    
    @include('layouts.header')
    
    @include('layouts.sidebar')
    
    @yield('content')

    @include('layouts.scripts')

</body>

</html>
