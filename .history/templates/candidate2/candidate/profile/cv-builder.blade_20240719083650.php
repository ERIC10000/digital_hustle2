<!-- templates/candidate2/profile/section.html -->
{% extends 'candidate2/profile/index.html' %}

{% block css %}
    <link rel="stylesheet" href="{{ url_for('static', filename='css/bootstrap-datetimepicker.css') }}">
{% endblock %}

{% block section %}
    <div class="row">
        <div class="d-flex justify-content-end">
            <a href="#cvModal" role="button" class="btn btn-primary cv-preview" data-bs-toggle="modal">{{ _('messages.common.preview') }}</a>
        </div>
        <div class="col-md-12 mt-5 shadow p-9 card">
            <!-- General Section -->
            <div id="candidateGeneralDiv">
                {% include 'candidate2/profile/career_informations/show_general.html' %}
            </div>
            <div class="d-none" id="editGeneralDiv">
                {% include 'candidate2/profile/career_informations/edit_general.html' %}
            </div>
            <!-- Education Section -->
            <div class="border-bottom border-danger my-5 border-2 d-flex justify-content-between">
                <h5 class="mt-2 fs-2 text-info">
                    <i class="fas fa-user-graduate text-info p-3 border rounded-circle border-info me-3"></i>
                    {{ _('messages.candidate_profile.education') }}
                </h5>
                <a href="javascript:void(0)" class="addEducationBtn">
                    <i class="fas fa-plus-circle fa-2x text-primary"></i>
                </a>
            </div>
            <div class="section-body">
                <div class="row candidate-education-container" id="candidateEducationsDiv">
                    {% include 'candidate2/profile/career_informations/show_education.html' %}
                </div>
                <div class="d-none" id="createEducationsDiv">
                    {% include 'candidate2/profile/career_informations/create_education.html' %}
                </div>
                <div class="d-none" id="editEducationsDiv">
                    {% include 'candidate2/profile/career_informations/edit_education.html' %}
                </div>
            </div>
            <!-- Experience Section -->
            <div class="border-bottom my-5 border-danger border-2 d-flex justify-content-between">
                <h5 class="mt-2 fs-2 text-info">
                    <i class="fas fa-briefcase text-info p-3 border rounded-circle border-info me-3"></i>
                    {{ _('messages.candidate_profile.experience') }}
                </h5>
                <a href="javascript:void(0)" class="addExperienceBtn">
                    <i class="fas fa-plus-circle fa-2x text-primary"></i>
                </a>
            </div>
            <div class="section-body">
                <div class="row candidate-experience-container" id="candidateExperienceDiv">
                    {% include 'candidate2/profile/career_informations/show_experience.html' %}
                </div>
                <div class="d-none" id="createExperienceDiv">
                    {% include 'candidate2/profile/career_informations/create_experience.html' %}
                </div>
                <div class="d-none" id="editExperienceDiv">
                    {% include 'candidate2/profile/career_informations/edit_experience.html' %}
                </div>
            </div>
            <!-- Online Profile Section -->
            <div class="border-bottom my-5 border-danger border-2 d-flex justify-content-between">
                <h5 class="mt-2 fs-2 text-info">
                    <i class="fas fa-link text-info p-3 border rounded-circle border-info me-3"></i>
                    {{ _('messages.candidate_profile.online_profile') }}
                </h5>
                <a href="javascript:void(0)" class="addOnlineProfileBtn">
                    <i class="fas fa-plus-circle fa-2x text-primary"></i>
                </a>
            </div>
            <div class="section-body">
                <div class="row" id="candidateOnlineProfileDiv">
                    {% include 'candidate2/profile/career_informations/show_online_profile.html' %}
                </div>
                <div class="d-none" id="addOnlineProfileDiv">
                    {% include 'candidate2/profile/career_informations/edit_online_profile.html' %}
                </div>
            </div>
        </div>
    </div>
    {% include 'candidate2/profile/modals/cv_preview_model.html' %}
    {% include 'candidate2/profile/templates/templates.html' %}
    <input type="hidden" id="pluginUrl" value="{{ url_for('static', filename='css/plugins.css') }}">
    <input type="hidden" id="styleCssUrl" value="{{ url_for('static', filename='assets/css/style.css') }}">
    <input type="hidden" id="fontCssUrl" value="{{ url_for('static', filename='assets/css/font-awesome.min.css') }}">
    <input type="hidden" id="isEditProfile" value="true">
    <input type="hidden" id="countryId" value="{{ user.country_id }}">
    <input type="hidden" id="stateId" value="{{ user.state_id }}">
    <input type="hidden" id="cityId" value="{{ user.city_id }}">
    <input type="hidden" id="cvPresent" value="{{ _('messages.candidate_profile.present') }}">
    <input type="hidden" id="indexCvBuilderData" value="true">
{% endblock %}

{% block scripts %}
    <script>
        let candidateProfileUrl = "{{ url_for('candidate.edit_profile') }}";
        let updateCandidateUrl = "{{ url_for('candidate.general_profile_update') }}";
        let updateonlineProfileUrl = "{{ url_for('candidate.online_profile_update') }}";
        let addExperienceUrl = "{{ url_for('candidate.create_experience') }}";
        let experienceUrl = "{{ url_for('candidate.candidate_experience', candidate_id='') }}/";
        let addEducationUrl = "{{ url_for('candidate.create_education') }}";
        let candidateUrl = "{{ url_for('candidate.index') }}/";
        let educationUrl = "{{ url_for('candidate.candidate_education', education_id='') }}/";
        let present = "{{ _('messages.candidate_profile.present') }}";
        let countryId = '{{ user.country_id }}';
        let stateId = '{{ user.state_id }}';
        let cityId = '{{ user.city_id }}';
        let pluginUrl = "{{ url_for('static', filename='assets/plugins/plugins.bundle.css') }}";
        let styleCssUrl = "{{ url_for('static', filename='assets/css/style.bundle.css') }}";
        let fontCssUrl = "{{ url_for('static', filename='assets/css/font-awesome.min.css') }}";
        let cvTemplateUrl = "{{ url_for('candidate.cv_template') }}";
    </script>
    <script src="{{ url_for('static', filename='assets/js/moment.min.js') }}"></script>
    <script src="{{ url_for('static', filename='js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ url_for('static', filename='js/html2pdf.bundle.min.js') }}"></script>
    <script src="{{ url_for('static', filename='js/candidate-profile/candidate-education-experience.js') }}"></script>
    <script src="{{ url_for('static', filename='js/candidate-profile/cv-builder.js') }}"></script>
{% endblock %}
