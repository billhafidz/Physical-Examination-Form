@extends('app')

@section('title', 'Animal Examination Form')

@section('content')
    <div class="d-flex align-items-center justify-content-center mb-4">
        <img src="{{ asset('images/ipb.png') }}" alt="Clinic Logo" style="height: 120px; width: auto; margin-right: 20px;">
        <div>
            <h3 style="display: inline;">Physical Examination Form</h3>
            <div style="margin-top: 15px;">
                <p style="margin-bottom: 0;">Animal Clinic Vocational School Education IPB University</p>
                <p style="margin-bottom: 0;">Jl. Raya Padjajaran, Bogor City, West Java 16128</p>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('animal.store') }}" method="POST">
        @csrf

        <br><br>
        <div class="form-step" id="step1">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="search_patient_id">Search Patient ID:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="search_patient_id" placeholder="Enter Patient ID">
                        <div class="input-group-append">
                            <button type="button" id="search_button" class="btn btn-primary">Search</button>
                            <button type="button" id="reset_button" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                    <ul id="search_results" class="list-group mt-2" style="display: none;"></ul>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="patient_id">Patient ID:</label>
                    <input type="text" class="form-control" name="patient_id" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Owner Name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="telephone_number">Telephone Number:</label>
                    <input type="text" class="form-control" name="telephone_number" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="animal_name">Patient Name:</label>
                    <input type="text" class="form-control" name="animal_name" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="animal_type">Type of Animal:</label>
                    <input type="text" class="form-control" name="animal_type" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fur_color">Color of Fur/Skin:</label>
                    <input type="text" class="form-control" name="fur_color" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="breed">Breed:</label>
                    <input type="text" class="form-control" name="breed" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="weight">Weight:</label>
                    <input type="number" class="form-control" name="weight" step="0.01" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="specific_signs">Animal-specific Signs:</label>
                    <input type="text" class="form-control" name="specific_signs" required>
                </div>
            </div>

            <div class="form-group">
                <label>Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male" required>
                    <label class="form-check-label" for="gender_male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female"
                        required>
                    <label class="form-check-label" for="gender_female">Female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="exam_date">Exam Date:</label>
                <input type="date" class="form-control" name="exam_date" required>
            </div>

            <div class="form-group">
                <label for="doctor">DVM:</label>
                <input type="text" class="form-control" name="doctor" required>
            </div>

            <br>
            <div class="d-flex align-items-center justify-content-center mb-4">
                <h3 style="display: inline;">Anamnesis</h3>
            </div>

            <div class="form-group">
                <label for="medical_history">Medical History:</label>
                <textarea class="form-control" name="medical_history" rows="3"
                    placeholder="Provide medical history of the animal"></textarea>
            </div>

            <div class="form-group">
                <label for="anamnesis">Anamnesis:</label>
                <textarea class="form-control" name="anamnesis" rows="3" placeholder="Provide anamnesis details"></textarea>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <button type="button" class="btn btn-primary next-btn">Next</button>
            </div>
        </div>

        {{-- <br> --}}
        <div class="form-step" id="step2" style="display:none;">
            <div class="d-flex align-items-center justify-content-center mb-4">
                <h3 style="display: inline;">Physical Examination Result</h3>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="bcs">Body Condition Score (1-5):</label>
                    <input type="number" class="form-control" name="bcs" min="1" max="5" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="attitude">Attitude:</label>
                    <input type="text" class="form-control" name="attitude" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="temperature">Temperature (°C):</label>
                    <input type="number" class="form-control" name="temperature" step="0.01" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="activity">Activity:</label>
                    <input type="text" class="form-control" name="activity" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12 mt-1">
                    <label for="posture">Posture:</label>
                    <input type="text" class="form-control" name="posture" required>
                </div>
            </div>

            @foreach (['nares', 'integument', 'eyes', 'ears', 'oral_cavity_teeth_incisor_occlusion', 'oral_cavity_teeth_molar_occlusion'] as $exam)
                <div class="form-group">
                    <label for="{{ $exam }}">{{ ucfirst($exam) }}</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $exam }}"
                            id="{{ $exam }}_normal" value="normal" required>
                        <label class="form-check-label" for="{{ $exam }}_normal">Normal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $exam }}"
                            id="{{ $exam }}_abnormal" value="abnormal" required>
                        <label class="form-check-label" for="{{ $exam }}_abnormal">Abnormal</label>
                    </div>
                    <div class="form-group" id="{{ $exam }}_explanation"
                        style="display: none; margin-left: 10px;">
                        <input type="text" class="form-control" name="{{ $exam }}_explanation"
                            placeholder="Explanation if abnormal">
                    </div>
                </div>
            @endforeach

            <div class="form-group">
                <label>Hydration Status:</label>
                <div class="d-flex">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hydration_status" id="hydration_normal"
                            value="normal" required>
                        <label class="form-check-label" for="hydration_normal">Normal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hydration_status" id="hydration_lower_5"
                            value="lower_5%" required>
                        <label class="form-check-label" for="hydration_lower_5">
                            < 5%</label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hydration_status" id="hydration_5_10"
                            value="5-10%" required>
                        <label class="form-check-label" for="hydration_5_10">5 - 10%</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hydration_status" id="hydration_above_10"
                            value="above_10%" required>
                        <label class="form-check-label" for="hydration_above_10">> 10%</label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12 mt-1">
                    <label for="mucous_membranes">Mucous Membranes:</label>
                    <input type="text" class="form-control" name="mucous_membranes" required>
                </div>
            </div>

            @foreach (['body_condition', 'anus', 'abdominal_palpation', 'lymph_nodes', 'legs_palation', 'legs_range_of_motion', 'nails', 'plantar_surface'] as $exam)
                <div class="form-group">
                    <label for="{{ $exam }}">{{ ucfirst($exam) }}</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $exam }}"
                            id="{{ $exam }}_normal" value="normal" required>
                        <label class="form-check-label" for="{{ $exam }}_normal">Normal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $exam }}"
                            id="{{ $exam }}_abnormal" value="abnormal" required>
                        <label class="form-check-label" for="{{ $exam }}_abnormal">Abnormal</label>
                    </div>
                    <div class="form-group" id="{{ $exam }}_explanation"
                        style="display: none; margin-left: 10px;">
                        <input type="text" class="form-control" name="{{ $exam }}_explanation"
                            placeholder="Explanation if abnormal">
                    </div>
                </div>
            @endforeach

            <br>
            <div class="mb-4">
                <h3 style="display: inline;">Neurological Exam</h3>
            </div>

            @foreach (['awareness_of_surroundings', 'ability_to_move_properly'] as $exam)
                <div class="form-group">
                    <label for="{{ $exam }}">{{ ucfirst($exam) }}</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $exam }}"
                            id="{{ $exam }}_normal" value="normal" required>
                        <label class="form-check-label" for="{{ $exam }}_normal">Normal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $exam }}"
                            id="{{ $exam }}_abnormal" value="abnormal" required>
                        <label class="form-check-label" for="{{ $exam }}_abnormal">Abnormal</label>
                    </div>
                    <div class="form-group" id="{{ $exam }}_explanation"
                        style="display: none; margin-left: 10px;">
                        <input type="text" class="form-control" name="{{ $exam }}_explanation"
                            placeholder="Explanation if abnormal">
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="button" class="btn btn-primary next-btn">Next</button>
            </div>
        </div>

        <br>
        <div class="form-step" id="step3" style="display:none;">
            <div class="d-flex mb-4">
                <h3 style="display: inline;">Parasites</h3>
            </div>

            @foreach (['ectoparasite', 'endoparasite'] as $exam)
                <div class="form-group">
                    <label for="{{ $exam }}">{{ ucfirst($exam) }}</label>
                    <input type="text" class="form-control" name="{{ $exam }}"
                        placeholder="Fill only if found">
                </div>
            @endforeach

            <br>
            <div class="d-flex mb-4">
                <h3 style="display: inline;">Auscultation</h3>
            </div>

            @foreach (['cardiovascular'] as $exam)
                <div class="form-group">
                    <label for="{{ $exam }}">{{ ucfirst($exam) }}</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $exam }}"
                            id="{{ $exam }}_normal" value="normal" required>
                        <label class="form-check-label" for="{{ $exam }}_normal">Normal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $exam }}"
                            id="{{ $exam }}_abnormal" value="abnormal" required>
                        <label class="form-check-label" for="{{ $exam }}_abnormal">Abnormal</label>
                    </div>
                    <div class="form-group" id="{{ $exam }}_explanation"
                        style="display: none; margin-left: 10px;">
                        <input type="text" class="form-control" name="{{ $exam }}_explanation"
                            placeholder="Explanation if abnormal">
                    </div>
                </div>
            @endforeach

            <div class="form-row">
                <div class="form-group col-12 mt-1">
                    <label for="heart_rate">Heart Rate (HR):</label>
                    <input type="text" class="form-control" name="heart_rate" required>
                </div>
            </div>

            @foreach (['respiratory'] as $exam)
                <div class="form-group">
                    <label for="{{ $exam }}">{{ ucfirst($exam) }}</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $exam }}"
                            id="{{ $exam }}_normal" value="normal" required>
                        <label class="form-check-label" for="{{ $exam }}_normal">Normal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $exam }}"
                            id="{{ $exam }}_abnormal" value="abnormal" required>
                        <label class="form-check-label" for="{{ $exam }}_abnormal">Abnormal</label>
                    </div>
                    <div class="form-group" id="{{ $exam }}_explanation"
                        style="display: none; margin-left: 10px;">
                        <input type="text" class="form-control" name="{{ $exam }}_explanation"
                            placeholder="Explanation if abnormal">
                    </div>
                </div>
            @endforeach

            <div class="form-row">
                <div class="form-group col-12 mt-1">
                    <label for="respiratory_rate">Respiratory Rate (RR):</label>
                    <input type="text" class="form-control" name="respiratory_rate" required>
                </div>
            </div>

            <br>
            <div class="d-flex align-items-center justify-content-center mb-4">
                <h3 style="display: inline;">Conclusion</h3>
            </div>

            <div class="form-group">
                <label for="diagnosis">Diagnosis:</label>
                <textarea class="form-control" name="diagnosis" rows="3" placeholder="Provide diagnosis of the animal"></textarea>
            </div>

            <div class="form-group">
                <label for="further_checkup">Further Checkup:</label>
                <textarea class="form-control" name="further_checkup" rows="3" placeholder="Provide further checkup"></textarea>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {{-- <button type="submit" class="btn btn-primary btn-block">Submit</button> --}}
    </form>

    <script>
        const formSteps = document.querySelectorAll('.form-step');
        const nextButtons = document.querySelectorAll('.next-btn');
        const prevButtons = document.querySelectorAll('.prev-btn');

        let currentStep = 0;

        nextButtons.forEach((button) => {
            button.addEventListener('click', () => {
                formSteps[currentStep].style.display = 'none';
                currentStep++;
                formSteps[currentStep].style.display = 'block';
            });
        });

        prevButtons.forEach((button) => {
            button.addEventListener('click', () => {
                formSteps[currentStep].style.display = 'none';
                currentStep--;
                formSteps[currentStep].style.display = 'block';
            });
        });
    </script>

    <script>
        document.querySelectorAll('input[type=radio]').forEach((radio) => {
            radio.addEventListener('change', function() {
                const explanationDiv = document.getElementById(this.name + '_explanation');
                if (this.value === 'abnormal') {
                    explanationDiv.style.display = 'inline-block';
                } else {
                    explanationDiv.style.display = 'none';
                    explanationDiv.querySelector('input').value = '';
                }
            });
        });
    </script>

    <script>
        document.getElementById('search_button').addEventListener('click', function() {
            searchPatient();
        });

        document.getElementById('search_patient_id').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                searchPatient();
            }
        });

        document.getElementById('reset_button').addEventListener('click', function() {
            resetSearch();
        });

        function searchPatient() {
            const patientId = document.getElementById('search_patient_id').value;

            fetch(`/search/${patientId}`)
                .then(response => response.json())
                .then(data => {
                    const resultsContainer = document.getElementById('search_results');
                    resultsContainer.innerHTML = '';
                    resultsContainer.style.display = 'block';

                    if (data.length === 0) {
                        resultsContainer.innerHTML = '<li class="list-group-item">No results found</li>';
                    } else {
                        data.forEach(animal => {
                            const li = document.createElement('li');
                            li.className = 'list-group-item';
                            li.textContent =
                                `ID: ${animal.patient_id}, Owner: ${animal.owner.name}, Patient: ${animal.animal_name}`;
                            li.onclick = function() {
                                showAnimalDetails(animal);
                                resultsContainer.style.display = 'none';
                            };
                            resultsContainer.appendChild(li);
                        });
                    }
                });
        }

        function resetSearch() {
            document.getElementById('search_patient_id').value = '';

            const resultsContainer = document.getElementById('search_results');
            resultsContainer.innerHTML = '';
            resultsContainer.style.display = 'none';

            const formInputs = document.querySelectorAll('input, textarea');
            formInputs.forEach(input => {
                if (input.type === 'text' || input.type === 'number' || input.type === 'email' || input.type ===
                    'date' || input.tagName === 'TEXTAREA') {
                    input.value = '';
                } else if (input.type === 'radio') {
                    input.checked = false;
                }
            });

        }

        function showAnimalDetails(animal) {
            document.querySelector('input[name="patient_id"]').value = animal.patient_id;
            document.querySelector('input[name="animal_name"]').value = animal.animal_name || '';
            document.querySelector('input[name="animal_type"]').value = animal.animal_type || '';
            document.querySelector('input[name="fur_color"]').value = animal.fur_color || '';
            document.querySelector('input[name="breed"]').value = animal.breed || '';
            document.querySelector('input[name="weight"]').value = animal.weight || '';
            document.querySelector('input[name="specific_signs"]').value = animal.specific_signs || '';
            document.querySelector('input[name="gender"][value="' + (animal.gender || '') + '"]').checked = true;

            const examDateInput = document.querySelector('input[name="exam_date"]');
            if (animal.exam_date) {
                const date = new Date(animal.exam_date);
                const formattedDate = date.toISOString().split('T')[0];
                examDateInput.value = formattedDate;
            } else {
                examDateInput.value = '';
            }

            document.querySelector('input[name="doctor"]').value = animal.doctor || '';
            document.querySelector('textarea[name="medical_history"]').value = animal.medical_history || '';
            document.querySelector('textarea[name="anamnesis"]').value = animal.anamnesis || '';
            document.querySelector('textarea[name="diagnosis"]').value = animal.diagnosis || '';
            document.querySelector('textarea[name="further_checkup"]').value = animal.further_checkup || '';

            // Mengisi data owner
            if (animal.owner) {
                document.querySelector('input[name="name"]').value = animal.owner.name || '';
                document.querySelector('input[name="address"]').value = animal.owner.address || '';
                document.querySelector('input[name="email"]').value = animal.owner.email || '';
                document.querySelector('input[name="telephone_number"]').value = animal.owner.telephone_number || '';
            }

            // Mengisi form dengan data physical examination
            if (animal.physical_examination) {
                const physicalExam = animal.physical_examination;

                function setRadioAndExplanation(name, value, explanation) {
                    const radio = document.querySelector(`input[name="${name}"][value="${value}"]`);
                    if (radio) {
                        radio.checked = true;

                        // Get explanation div
                        const explanationDiv = document.getElementById(`${name}_explanation`);
                        if (explanationDiv) {
                            if (value === 'abnormal') {
                                explanationDiv.style.display = 'inline-block';
                                const explanationInput = explanationDiv.querySelector('input');
                                if (explanationInput) {
                                    explanationInput.value = explanation || '';
                                }
                            } else {
                                explanationDiv.style.display = 'none';
                            }
                        }
                    }
                }

                // Mengisi nilai input dasar
                const basicInputs = ['bcs', 'attitude', 'temperature', 'activity', 'posture',
                    'mucous_membranes', 'ectoparasite', 'endoparasite',
                    'heart_rate', 'respiratory_rate'
                ];

                basicInputs.forEach(input => {
                    const inputElement = document.querySelector(`input[name="${input}"]`);
                    if (inputElement) {
                        inputElement.value = physicalExam[input] || '';
                    }
                });

                // Mengatur radio button untuk hydration_status
                setRadioAndExplanation('hydration_status', physicalExam.hydration_status);

                // Array dari nama pemeriksaan
                const examinations = [
                    'nares', 'integument', 'eyes', 'ears',
                    'oral_cavity_teeth_incisor_occlusion',
                    'oral_cavity_teeth_molar_occlusion',
                    'body_condition', 'anus', 'abdominal_palpation',
                    'lymph_nodes', 'legs_palation', 'legs_range_of_motion',
                    'nails', 'plantar_surface', 'awareness_of_surroundings',
                    'ability_to_move_properly', 'cardiovascular', 'respiratory'
                ];

                // Mengisi nilai untuk setiap pemeriksaan
                examinations.forEach(exam => {
                    setRadioAndExplanation(
                        exam,
                        physicalExam[exam],
                        physicalExam[`${exam}_explanation`]
                    );
                });
            } else {
                console.log('Physical examination data not available');
            }
        }
    </script>
@endsection
