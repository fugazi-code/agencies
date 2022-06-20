<div>
    <livewire:toaster/>
    <div class="card mt-5">
        <div class="card-body">
            <div class="card-title mb-4 d-flex flex-row">
                <h3>Applicant Form</h3>
            </div>
            <div class="row">
                <div class="col-md-3 mb-2">
                    <label>Position Selected</label>
                    <x-input model="details.position_selected"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Name</label>
                    <x-input model="details.fullname"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Contact</label>
                    <x-input model="details.contact_1"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Code</label>
                    <div class="d-flex flex-row w-100">
                        <x-input model="details.code" wrapper="w-100" attr="readonly"/>
                        <x-a-button>
                            <x-slot name="others">
                                wire:click='generateCode'
                            </x-slot>
                            Generate
                        </x-a-button>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Address</label>
                    <x-input model="details.address"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Date Of Birth</label>
                    <x-input type="date" model="details.birth_date"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Place Of Birth</label>
                    <x-input model="details.birth_place"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Passport No.</label>
                    <x-input model="details.passport"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Place Of Issue</label>
                    <x-input model="details.place_issue"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Date Of Issue</label>
                    <x-input type="date" model="details.date_issue"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Date Of Expiry</label>
                    <x-input type="date" model="details.date_expiry"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Elementary</label>
                    <x-input model="details.elementary"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>High School</label>
                    <x-input model="details.high_school"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Vocational</label>
                    <x-input model="details.vocational"/>
                </div>
                <div class="col-md-3 mb-2">
                    <label>College</label>
                    <x-input model="details.college"/>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Father's Name</label>
                    <x-input model="details.father_name"/>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Father's Occupation</label>
                    <x-input model="details.father_occupation"/>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-4 mb-2">
                    <label>Mother's Name</label>
                    <x-input model="details.father_name"/>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Mother's Occupation</label>
                    <x-input model="details.mother_occupation"/>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-4 mb-2">
                    <label>Spouse' Name</label>
                    <x-input model="details.spouse_name"/>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Spouse' Occupation</label>
                    <x-input model="details.spouse_occupation"/>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-2 mb-2">
                    <label>Gender</label>
                    <x-select model="details.gender">
                        <option value="F">Female</option>
                        <option value="M">Male</option>
                    </x-select>
                </div>
                <div class="col-md-2 mb-2">
                    <label>Religion</label>
                    <x-input model="details.religion"/>
                </div>
                <div class="col-md-2 mb-2">
                    <label>Civil Status</label>
                    <x-input model="details.civil_status"/>
                </div>
                <div class="col-md-2 mb-2">
                    <label>Height</label>
                    <x-input model="details.height"/>
                </div>
                <div class="col-md-2 mb-2">
                    <label>Weight</label>
                    <x-input model="details.weight"/>
                </div>
                <div class="col-md-4 mb-2 mt-4">
                    <div class="col-md-auto d-flex flex-row">
                        <h4 class="mr-2">Childrens</h4> <x-a-button click="addChildren">Add Children</x-a-button>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table>
                                <thead>
                                <th class="text-center">Sex</th>
                                <th class="text-center">Age</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($children as $key => $child)
                                    <tr>
                                        <td>
                                            <x-input model="children.{{ $key }}.gender"></x-input>
                                        </td>
                                        <td>
                                            <x-input model="children.{{ $key }}.age"></x-input>
                                        <td>
                                            <x-a-button class="btn btn-danger" click="childUnset({{ $key }})">Remove</x-a-button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2 mt-4">
                    <div class="col-md-auto d-flex flex-row">
                        <h4 class="mr-2">Work History</h4> <x-a-button click="addWorkHistory">Add Work History</x-a-button>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table>
                                <thead>
                                    <th class="text-center">Country</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Periods</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                @foreach($workHistory as $key => $work)
                                    <tr>
                                        <td>
                                            <x-input model="workHistory.{{ $key }}.country"></x-input>
                                        </td>
                                        <td>
                                            <x-input model="workHistory.{{ $key }}.position"></x-input>
                                        </td>
                                        <td>
                                            <x-input model="workHistory.{{ $key }}.year"></x-input>
                                        </td>
                                        <td>
                                            <x-a-button class="btn btn-danger" click="workUnset({{ $key }})">Remove</x-a-button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
