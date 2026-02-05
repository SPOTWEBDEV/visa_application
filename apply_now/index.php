<?php include "../server/connection.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>APPLY  || <?php echo $sitename ?></title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $domain ?>/assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $domain ?>/assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $domain ?>/assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="<?php echo $domain ?>/assets/images/favicons/site.webmanifest" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/aos/css/aos.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/visanet-icons/style.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/css/visanet.css" />

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Make select and date look like your input */
        select.form-one__input,
        input[type="date"].form-one__input {
            height: 60px;
            width: 100%;
            border-radius: 10px;
            border: 1px solid #e6e6e6;
            padding: 0 20px;
            background: #fff;
            outline: none;
        }

        input[type="date"].form-one__input {
            padding-right: 44px;
            appearance: none;
            -webkit-appearance: none;
        }

        input[type="date"].form-one__input::-webkit-calendar-picker-indicator {
            opacity: 0.7;
            cursor: pointer;
        }

        .mini-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border: 1px solid #eee;
            border-radius: 999px;
            font-size: 14px;
            margin-right: 8px;
            margin-top: 8px;
        }

        .visa-type-box {
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 16px;
            margin-top: 10px;
        }

        .visa-type-box h4 {
            font-size: 16px;
            margin: 0 0 12px 0;
        }

        /* ✅ BEAUTIFUL FILE UPLOAD (aligned like other fields) */
        .upload-box {
            border: 1px dashed #dcdcdc;
            border-radius: 12px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 14px;
            background: #fff;
            cursor: pointer;
            transition: .2s ease;
        }

        .upload-box:hover {
            border-color: #cfcfcf;
        }

        .upload-box__left {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .upload-box__icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            border: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
        }

        .upload-box__text {
            min-width: 0;
        }

        .upload-box__title {
            font-size: 13px;
            margin: 0;
            line-height: 1.1;
        }

        .upload-box__file {
            font-size: 12px;
            opacity: 0.75;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 280px;
        }

        .upload-box__btn {
            height: 40px;
            padding: 0 14px;
            border-radius: 10px;
            border: 1px solid #eee;
            background: #fafafa;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .upload-hidden-input {
            position: absolute;
            left: -9999px;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        .upload-note {
            font-size: 12px;
            opacity: .7;
            margin-top: 6px;
        }
    </style>
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <?php include "../include/nav.php" ?>

    <section class="checkout-page section-space">
        <div class="container">

            <form id="visaWizardForm" class="checkout-page__form" enctype="multipart/form-data" novalidate>
                <!-- keep visa type & country -->
                <input type="hidden" id="visa_type" name="visa_type" value="">
                <input type="hidden" id="selected_country" name="selected_country" value="">
                <input type="hidden" id="entry_source" name="entry_source" value="">

                <!-- Progress -->
                <div class="checkout-page__your-order" style="margin-bottom:20px;">
                    <h2 class="checkout-page__title">Visa Application Form</h2>

                    <div id="selectedPreview" style="margin:8px 0 0 0;"></div>

                    <p id="wizardStatus" style="margin:10px 0 0 0;">
                        Step <span id="stepNumber">1</span> of <span id="stepTotal">4</span>
                    </p>
                </div>

                <!-- STEP 0: ENTRY STEP -->
                <div class="visa-step" data-step="0" style="display:none;">
                    <h2 class="checkout-page__title">Start Application</h2>

                    <div class="form-one">
                        <div class="form-one__group">

                            <div id="entryCountryBlock" class="form-one__control form-one__control--full" style="display:none;">
                                <label style="display:block;margin-bottom:6px;">Select Country</label>
                                <select id="start_country" class="form-one__input">
                                    <option value="" selected>Choose Country</option>
                                    <option value="United States">United States</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Argentina">Argentina</option>
                                </select>
                            </div>

                            <div id="entryVisaTypeBlock" class="form-one__control form-one__control--full" style="display:none;">
                                <label style="display:block;margin-bottom:6px;">Select Visa Type</label>
                                <select id="start_visa_type" class="form-one__input">
                                    <option value="" selected>Choose Visa Type</option>
                                    <option value="business">Business Visa</option>
                                    <option value="immigration">Immigration Visa</option>
                                    <option value="travel">Travel Visa</option>
                                    <option value="family">Family Visa</option>
                                    <option value="student">Student Visa</option>
                                    <option value="processing">Quick Visa Processing</option>
                                </select>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <button type="button" id="startBtn" class="visanet-btn-two">
                                    Continue <span class="visanet-btn-two__icon"><i class="icon-arrow-right"></i></span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- STEP 1 -->
                <div class="visa-step" data-step="1">
                    <h2 class="checkout-page__title">1️⃣ Applicant Personal Information</h2>

                    <div class="form-one">
                        <div class="form-one__group">
                            <div class="form-one__control">
                                <input type="text" name="first_name" placeholder="First Name (as in passport)" class="form-one__input" required>
                            </div>
                            <div class="form-one__control">
                                <input type="text" name="middle_name" placeholder="Middle Name (optional)" class="form-one__input">
                            </div>
                            <div class="form-one__control">
                                <input type="text" name="last_name" placeholder="Last Name (as in passport)" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <select class="form-one__input" name="gender" required>
                                    <option value="" selected>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-one__control">
                                <label style="display:block;font-size:13px;margin-bottom:5px;">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="text" name="birth_city" placeholder="Place of Birth (City)" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="text" name="birth_country" placeholder="Place of Birth (Country)" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="text" name="nationality" placeholder="Nationality" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="text" name="current_residence_country" placeholder="Current Country of Residence" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <select class="form-one__input" name="marital_status" required>
                                    <option value="" selected>Marital Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="separated">Separated</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="national_id_number" placeholder="National Identification Number (optional)" class="form-one__input">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 2 -->
                <div class="visa-step" data-step="2" style="display:none;">
                    <h2 class="checkout-page__title">2️⃣ Passport Information</h2>

                    <div class="form-one">
                        <div class="form-one__group">
                            <div class="form-one__control">
                                <select class="form-one__input" name="passport_type" required>
                                    <option value="" selected>Passport Type</option>
                                    <option value="regular">Regular</option>
                                    <option value="official">Official</option>
                                    <option value="diplomatic">Diplomatic</option>
                                </select>
                            </div>

                            <div class="form-one__control">
                                <input type="text" name="passport_number" placeholder="Passport Number" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="text" name="issuing_country" placeholder="Issuing Country" class="form-one__input" required>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="issuing_authority" placeholder="Issuing Authority" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <label style="display:block;font-size:13px;margin-bottom:5px;">Date of Issue</label>
                                <input type="date" name="date_of_issue" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <label style="display:block;font-size:13px;margin-bottom:5px;">Expiry Date</label>
                                <input type="date" name="expiry_date" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="text" name="previous_passport_number" placeholder="Previous Passport Number (optional)" class="form-one__input">
                            </div>

                            <!-- ✅ FIXED: name MUST be has_another_valid_passport -->
                            <div class="form-one__control">
                                <select class="form-one__input" name="has_another_valid_passport" required>
                                    <option value="" selected>Do you have another valid passport?</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <!-- ✅ NICE FILE UPLOAD (NOT tattered) -->
                            <div class="form-one__control form-one__control--full" style="position:relative;">
                                <label style="display:block;font-size:13px;margin-bottom:5px;">Upload Passport (Bio-data page)</label>

                                <!-- hidden real input -->
                                <input
                                    type="file"
                                    id="passport_biodata"
                                    name="passport_biodata"
                                    class="upload-hidden-input"
                                    accept=".jpg,.jpeg,.png,.webp,.pdf"
                                    required
                                >

                                <!-- pretty UI -->
                                <div class="upload-box" id="passportUploadBox" role="button" tabindex="0">
                                    <div class="upload-box__left">
                                        <div class="upload-box__icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="upload-box__text">
                                            <p class="upload-box__title">Choose passport file</p>
                                            <p class="upload-box__file" id="passportFileName">No file selected</p>
                                        </div>
                                    </div>

                                    <div class="upload-box__btn">
                                        <i class="fas fa-folder-open"></i> Browse
                                    </div>
                                </div>

                                <div class="upload-note">Allowed: JPG, PNG, WEBP, PDF (Max 8MB)</div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- STEP 3 -->
                <div class="visa-step" data-step="3" style="display:none;">
                    <h2 class="checkout-page__title">3️⃣ Contact & Address Information</h2>

                    <div class="form-one">
                        <div class="form-one__group">
                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="residential_address" placeholder="Current Residential Address" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="text" name="city" placeholder="City" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="text" name="state_province" placeholder="State / Province" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="text" name="postal_code" placeholder="Postal Code" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="text" name="country" placeholder="Country" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="tel" name="mobile_phone" placeholder="Mobile Phone Number" class="form-one__input" required>
                            </div>

                            <div class="form-one__control">
                                <input type="tel" name="alt_phone" placeholder="Alternative Phone (optional)" class="form-one__input">
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <input type="email" name="email" placeholder="Email Address" class="form-one__input" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 4 (VISA TYPE DETAILS) -->
                <div class="visa-step" data-step="4" style="display:none;">
                    <h2 class="checkout-page__title">4️⃣ Visa Type Details</h2>

                    <!-- STUDENT -->
                    <div class="visa-type-box visa-type-section" data-visa="student" style="display:none;">
                        <h4>Student Visa Details</h4>
                        <div class="form-one">
                            <div class="form-one__group">
                                <div class="form-one__control">
                                    <input type="text" name="school_name" placeholder="School Name" class="form-one__input" data-required="1">
                                </div>
                                <div class="form-one__control">
                                    <input type="text" name="course" placeholder="Course of Study" class="form-one__input" data-required="1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BUSINESS -->
                    <div class="visa-type-box visa-type-section" data-visa="business" style="display:none;">
                        <h4>Business Visa Details</h4>
                        <div class="form-one">
                            <div class="form-one__group">
                                <div class="form-one__control">
                                    <input type="text" name="company_name" placeholder="Company Name" class="form-one__input" data-required="1">
                                </div>
                                <div class="form-one__control form-one__control--full">
                                    <input type="text" name="business_purpose" placeholder="Business Purpose" class="form-one__input" data-required="1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAMILY -->
                    <div class="visa-type-box visa-type-section" data-visa="family" style="display:none;">
                        <h4>Family Visa Details</h4>
                        <div class="form-one">
                            <div class="form-one__group">
                                <div class="form-one__control">
                                    <input type="text" name="sponsor_name" placeholder="Sponsor Full Name" class="form-one__input" data-required="1">
                                </div>
                                <div class="form-one__control">
                                    <input type="text" name="relationship" placeholder="Relationship" class="form-one__input" data-required="1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TRAVEL -->
                    <div class="visa-type-box visa-type-section" data-visa="travel" style="display:none;">
                        <h4>Travel Visa Details</h4>
                        <div class="form-one">
                            <div class="form-one__group">
                                <div class="form-one__control">
                                    <label style="display:block;font-size:13px;margin-bottom:5px;">Travel Date</label>
                                    <input type="date" name="travel_date" class="form-one__input" data-required="1">
                                </div>
                                <div class="form-one__control">
                                    <label style="display:block;font-size:13px;margin-bottom:5px;">Return Date</label>
                                    <input type="date" name="return_date" class="form-one__input" data-required="1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- IMMIGRATION -->
                    <div class="visa-type-box visa-type-section" data-visa="immigration" style="display:none;">
                        <h4>Immigration Visa Details</h4>
                        <div class="form-one">
                            <div class="form-one__group">
                                <div class="form-one__control form-one__control--full">
                                    <input type="text" name="immigration_reason" placeholder="Reason for Immigration" class="form-one__input" data-required="1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PROCESSING -->
                    <div class="visa-type-box visa-type-section" data-visa="processing" style="display:none;">
                        <h4>Quick Visa Processing</h4>
                        <p style="margin:0;">No extra information is required for this step.</p>
                    </div>

                </div>

                <!-- Buttons -->
                <div style="display:flex;gap:10px;margin-top:20px;">
                    <button type="button" id="prevBtn" class="visanet-btn-two" style="display:none;">
                        <span class="visanet-btn-two__icon"><i class="icon-arrow-right" style="transform:rotate(180deg);display:inline-block;"></i></span>
                        Back
                    </button>

                    <button type="button" id="nextBtn" class="visanet-btn-two">
                        Next <span class="visanet-btn-two__icon"><i class="icon-arrow-right"></i></span>
                    </button>

                    <button type="submit" id="submitBtn" class="visanet-btn-two" style="display:none;">
                        Submit <span class="visanet-btn-two__icon"><i class="icon-arrow-right"></i></span>
                    </button>
                </div>

            </form>

        </div>
    </section>

    <?php include "../include/footer.php" ?>
    </div>

    <script>
        (function() {
            const LS_KEY = "visa_wizard_v1";

            const $ = (sel, root = document) => root.querySelector(sel);
            const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));

            // ✅ file upload UI handler
            function initPassportUploadUI() {
                const input = $("#passport_biodata");
                const box = $("#passportUploadBox");
                const nameEl = $("#passportFileName");
                if (!input || !box || !nameEl) return;

                const openPicker = () => input.click();

                box.addEventListener("click", openPicker);
                box.addEventListener("keydown", (e) => {
                    if (e.key === "Enter" || e.key === " ") {
                        e.preventDefault();
                        openPicker();
                    }
                });

                input.addEventListener("change", () => {
                    const f = input.files && input.files[0];
                    nameEl.textContent = f ? f.name : "No file selected";
                });
            }

            function getQueryParam(name) {
                const url = new URL(window.location.href);
                return url.searchParams.get(name);
            }

            function loadState() {
                try {
                    return JSON.parse(localStorage.getItem(LS_KEY)) || {};
                } catch (e) {
                    return {};
                }
            }

            function saveState(state) {
                localStorage.setItem(LS_KEY, JSON.stringify(state));
            }

            function getFormDataObject(formEl) {
                const data = {};
                const fd = new FormData(formEl);
                for (const [key, value] of fd.entries()) {
                    if (value instanceof File) continue; // don't store files in localStorage
                    data[key] = value;
                }
                return data;
            }

            function setFormValues(formEl, data) {
                if (!data) return;
                Object.keys(data).forEach((name) => {
                    const el = formEl.elements.namedItem(name);
                    if (!el) return;
                    if (el instanceof RadioNodeList) {
                        Array.from(el).forEach(r => {
                            if (r.value === data[name]) r.checked = true;
                        });
                    } else if (el.type === "checkbox") {
                        el.checked = data[name] === "on" || data[name] === "1" || data[name] === true;
                    } else {
                        el.value = data[name];
                    }
                });
            }

            function niceVisaName(v) {
                const map = {
                    business: "Business Visa",
                    immigration: "Immigration Visa",
                    travel: "Travel Visa",
                    family: "Family Visa",
                    student: "Student Visa",
                    processing: "Quick Visa Processing"
                };
                return map[v] || v || "—";
            }

            function renderPreview() {
                const visaType = $("#visa_type").value;
                const country = $("#selected_country").value;

                $("#selectedPreview").innerHTML = `
                    <span class="mini-pill"><strong>Visa Type:</strong> ${niceVisaName(visaType)}</span>
                    <span class="mini-pill"><strong>Country:</strong> ${country || "—"}</span>
                `;
            }

            function applyVisaTypeVisibility() {
                const v = ($("#visa_type").value || "").trim();

                $$(".visa-type-section").forEach(sec => { sec.style.display = "none"; });

                $$(".visa-type-section input, .visa-type-section select, .visa-type-section textarea").forEach(el => {
                    if (el.hasAttribute("data-required")) el.required = false;
                });

                const active = $(`.visa-type-section[data-visa="${v}"]`);
                if (active) {
                    active.style.display = "block";
                    $$("input, select, textarea", active).forEach(el => {
                        if (el.hasAttribute("data-required")) el.required = true;
                    });
                }
            }

            function showStep(step, totalSteps) {
                $$(".visa-step").forEach(s => s.style.display = "none");
                const active = $(`.visa-step[data-step="${step}"]`);
                if (active) active.style.display = "block";

                $("#stepNumber").textContent = step;
                $("#stepTotal").textContent = totalSteps;

                if (step === 0) {
                    $("#prevBtn").style.display = "none";
                    $("#nextBtn").style.display = "none";
                    $("#submitBtn").style.display = "none";
                    return;
                }

                $("#prevBtn").style.display = step > 1 ? "inline-flex" : "none";

                if (step >= totalSteps) {
                    $("#nextBtn").style.display = "none";
                    $("#submitBtn").style.display = "inline-flex";
                } else {
                    $("#nextBtn").style.display = "inline-flex";
                    $("#submitBtn").style.display = "none";
                }

                if (step === 4) applyVisaTypeVisibility();
            }

            function validateStepWithSwal(step) {
                const stepEl = $(`.visa-step[data-step="${step}"]`);
                if (!stepEl) return true;

                const fields = $$("input, select, textarea", stepEl)
                    .filter(f => f.type !== "hidden")
                    .filter(f => {
                        const style = window.getComputedStyle(f);
                        if (style.display === "none" || style.visibility === "hidden") return false;

                        let p = f.parentElement;
                        while (p) {
                            const ps = window.getComputedStyle(p);
                            if (ps.display === "none" || ps.visibility === "hidden") return false;
                            p = p.parentElement;
                        }
                        return true;
                    });

                for (const field of fields) {
                    if (!field.checkValidity()) {
                        const label = field.previousElementSibling && field.previousElementSibling.tagName === "LABEL"
                            ? field.previousElementSibling.textContent.trim()
                            : (field.getAttribute("placeholder") || field.name || "This field");

                        Swal.fire({
                            icon: "error",
                            title: "Please complete this step",
                            text: `${label}: ${field.validationMessage}`
                        });
                        field.focus();
                        return false;
                    }
                }
                return true;
            }

            document.addEventListener("DOMContentLoaded", () => {
                const form = $("#visaWizardForm");
                if (!form) return;

                initPassportUploadUI();

                const state = loadState();

                const visaTypeFromUrl = getQueryParam("visa_type");
                const countryFromUrl = getQueryParam("country");
                const entrySourceFromUrl = getQueryParam("from");

                // ✅ Force user to reselect depending on entry source
                // From visa page => always ask country
                // From country page => always ask visa type
                if (entrySourceFromUrl === "visa_page") {
                    $("#selected_country").value = ""; // force
                }
                if (entrySourceFromUrl === "country_page") {
                    $("#visa_type").value = ""; // force
                }

                // load from URL or state AFTER forcing rules above
                $("#visa_type").value = (entrySourceFromUrl === "country_page") ? "" : (visaTypeFromUrl || state.visa_type || "");
                $("#selected_country").value = (entrySourceFromUrl === "visa_page") ? "" : (countryFromUrl || state.selected_country || "");
                $("#entry_source").value = entrySourceFromUrl || state.entry_source || "";

                if (state.form_data) setFormValues(form, state.form_data);

                const TOTAL = 4;

                applyVisaTypeVisibility();
                renderPreview();

                // ✅ entry logic (now forced always)
                const entrySource = $("#entry_source").value;
                const needsCountry = (entrySource === "visa_page");      // always true for visa_page
                const needsVisaType = (entrySource === "country_page");  // always true for country_page

                if (needsCountry) {
                    $("#entryCountryBlock").style.display = "block";
                    $("#entryVisaTypeBlock").style.display = "none";
                    showStep(0, TOTAL);
                } else if (needsVisaType) {
                    $("#entryVisaTypeBlock").style.display = "block";
                    $("#entryCountryBlock").style.display = "none";
                    showStep(0, TOTAL);
                } else if (!$("#visa_type").value || !$("#selected_country").value) {
                    if (!$("#visa_type").value) {
                        $("#entryVisaTypeBlock").style.display = "block";
                        $("#entryCountryBlock").style.display = "none";
                    } else {
                        $("#entryCountryBlock").style.display = "block";
                        $("#entryVisaTypeBlock").style.display = "none";
                    }
                    showStep(0, TOTAL);
                } else {
                    showStep(parseInt(state.current_step || 1, 10), TOTAL);
                }

                $("#startBtn").addEventListener("click", () => {
                    const countryBlockVisible = $("#entryCountryBlock").style.display !== "none";
                    const visaBlockVisible = $("#entryVisaTypeBlock").style.display !== "none";

                    if (countryBlockVisible) {
                        const c = $("#start_country").value.trim();
                        if (!c) {
                            Swal.fire({ icon: "warning", title: "Select Country", text: "Please choose a country to continue." });
                            return;
                        }
                        $("#selected_country").value = c;
                    }

                    if (visaBlockVisible) {
                        const v = $("#start_visa_type").value.trim();
                        if (!v) {
                            Swal.fire({ icon: "warning", title: "Select Visa Type", text: "Please choose a visa type to continue." });
                            return;
                        }
                        $("#visa_type").value = v;
                    }

                    applyVisaTypeVisibility();
                    renderPreview();

                    const newState = {
                        visa_type: $("#visa_type").value,
                        selected_country: $("#selected_country").value,
                        entry_source: $("#entry_source").value || "unknown",
                        current_step: 1,
                        form_data: getFormDataObject(form)
                    };
                    saveState(newState);

                    showStep(1, TOTAL);
                });

                $("#nextBtn").addEventListener("click", () => {
                    const step = parseInt($("#stepNumber").textContent, 10);
                    if (step === 4) applyVisaTypeVisibility();

                    if (!validateStepWithSwal(step)) return;

                    const newState = {
                        visa_type: $("#visa_type").value,
                        selected_country: $("#selected_country").value,
                        entry_source: $("#entry_source").value,
                        current_step: step + 1,
                        form_data: getFormDataObject(form)
                    };
                    saveState(newState);

                    showStep(step + 1, TOTAL);
                });

                $("#prevBtn").addEventListener("click", () => {
                    const step = parseInt($("#stepNumber").textContent, 10);
                    const prev = Math.max(1, step - 1);

                    const newState = {
                        visa_type: $("#visa_type").value,
                        selected_country: $("#selected_country").value,
                        entry_source: $("#entry_source").value,
                        current_step: prev,
                        form_data: getFormDataObject(form)
                    };
                    saveState(newState);

                    showStep(prev, TOTAL);
                });

                form.addEventListener("submit", async (e) => {
                    e.preventDefault();

                    const step = parseInt($("#stepNumber").textContent, 10);
                    applyVisaTypeVisibility();

                    if (!validateStepWithSwal(step)) return;

                    if (!$("#visa_type").value || !$("#selected_country").value) {
                        Swal.fire({ icon: "warning", title: "Missing Info", text: "Please select Visa Type and Country before submitting." });
                        showStep(0, TOTAL);
                        return;
                    }

                    const confirm = await Swal.fire({
                        icon: "question",
                        title: "Submit Application?",
                        text: "Once you submit, your application will be sent for review.",
                        showCancelButton: true,
                        confirmButtonText: "Yes, Submit",
                        cancelButtonText: "Cancel"
                    });
                    if (!confirm.isConfirmed) return;

                    Swal.fire({
                        title: "Submitting...",
                        text: "Please wait.",
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });

                    try {
                        const fd = new FormData(form);
                        const API_URL = "../auth/api/submit_application.php";

                        const res = await fetch(API_URL, { method: "POST", body: fd });

                        const raw = await res.text();
                        let data;
                        try { data = JSON.parse(raw); }
                        catch (e) { throw new Error("Server did not return JSON. First 200 chars: " + raw.slice(0, 200)); }

                        if (!res.ok) throw new Error(data.message || ("HTTP Error " + res.status));
                        if (!data || data.ok !== true) throw new Error(data.message || "Submission failed.");

                        //clear local storage after success
                        localStorage.removeItem(LS_KEY);

                        await Swal.fire({
                            icon: "success",
                            title: "Submitted Successfully!",
                            text: data.message || "Your visa application has been submitted."
                        })

                        setTimeout(() => {
                            location.href = "../"
                        }, 1500);



                        
                    } catch (err) {
                        Swal.fire({
                            icon: "error",
                            title: "Submission Failed",
                            text: err.message || "Something went wrong. Please try again."
                        });
                    }
                });
            });
        })();
    </script>

    <!-- Keep template scripts (template uses them) -->
    <script src="<?php echo $domain ?>/assets/vendors/jquery/jquery-3.7.1.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/aos/js/aos.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/gsap/gsap.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/gsap/scrolltrigger.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/gsap/splittext.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/gsap/visanet-split.js"></script>

    <!-- visanet.js must load AFTER jQuery -->
    <script src="<?php echo $domain ?>/assets/js/visanet.js"></script>

</body>
</html>