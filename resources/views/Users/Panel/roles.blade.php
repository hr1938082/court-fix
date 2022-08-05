@extends('Users.Layout.main')
@section('title')
   Team Member Roles
@endsection
@section('page')
    @php
        $page = 'roles'
    @endphp
@endsection
@section('content')
  <section class="lg-padding" id="roles">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div id="roles_overview_title">
          <div class="container container-header">
            <div class="title text-dark no-margin"> <span>Overview of Adult Drug Treatment Court Team Member Roles</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray video-lightbox-section" id="story_recovery">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <!---->
          <div class="content">
            <div class="split">
              <div class="left margin container-header">
                <div class="subtitle"> 
                  <h2>A Story on Recovery and The Impact of Adult Treatment Courts</h2>
                </div>
                <div class="text text-dark mt-4">
                  <p>Listen to the incredible story of a treatment program graduate who is now employed at the Probation Department as a Peer Advocate.</p>
                  <p>Now that you’ve watched the incredible journey of treatment program graduate, learn more about each role and how they work with the team.</p>
                  <p><strong>Take Note: </strong> Adult Drug Treatment Courts may include other community representatives on their team as well, such as certified peer recovery specialists, vocational educational advisors, housing advocates, or sponsors from the self-help recovery community.</p>
                  <p>As a condition of federal grant funding and funding from many states, Drug Courts may also be required to include an evaluator on their team beginning in the planning stages for the program and continuing during implementation. Finally, Drug Courts may be advised to include a nurse or physician on their team if they treat substantial numbers of participants requiring medication for opioid use disorder or suffering from co-occurring medical or mental health disorders.</p>
                  <p>We encourage you to understand all the roles that may apply to your New York State jurisdiction to ensure good-quality program monitoring and evaluation [see Standard X, Monitoring and Evaluation].</p>
                </div>
              </div>
              <div class="videoWrapper media">
                <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                  <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/IMG_1939.jpg">
                    <source id="webm" src="src/media/videos/Peer Advocate Success Story with captions.mp4" type="video/webm">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="content">
            <div class="text text-dark mb-4 mt-5 i-flex"><i class="fa-solid fa-hand-pointer mr-1"></i>
              <h4>Hover your pointer or click on each job title to learn more.</h4>
            </div>
            <div class="split margin-row">
              <div class="card blue_card"><a class="pt-3 pb-3" href="#roles_judge"> 
                  <div class="container-header">
                    <div class="title">
                      <p>Judge</p>
                    </div>
                  </div>
                  <div class="details">
                    <p>The Roles of the Drug Court Judge</p>
                  </div></a></div>
              <div class="card blue_card"><a class="pt-3 pb-3" href="#roles_coordinator"> 
                  <div class="container-header">
                    <div class="title">
                      <p>Drug Court Coordinator</p>
                    </div>
                  </div>
                  <div class="details">
                    <p>The Roles of the Drug Court Coordinator</p>
                  </div></a></div>
              <div class="card blue_card"><a class="pt-3 pb-3" href="#roles_prosecutor"> 
                  <div class="container-header">
                    <div class="title">
                      <p>Prosecutor</p>
                    </div>
                  </div>
                  <div class="details">
                    <p>The Roles of the Prosecutor</p>
                  </div></a></div>
            </div>
            <div class="split"> 
              <div class="card blue_card"><a class="pt-3 pb-3" href="#roles_defense_counsel"> 
                  <div class="container-header">
                    <div class="title">
                      <p>Defense Counsel</p>
                    </div>
                  </div>
                  <div class="details">
                    <p>The Roles of the Defense Counsel</p>
                  </div></a></div>
              <div class="card blue_card"><a class="pt-3 pb-3" href="#roles_treatment_provider"> 
                  <div class="container-header">
                    <div class="title">
                      <p>Treatment Provider</p>
                    </div>
                  </div>
                  <div class="details">
                    <p>The Roles of the Treatment Provider</p>
                  </div></a></div>
              <div class="card blue_card"><a class="pt-3 pb-3" href="#roles_case_manager"> 
                  <div class="container-header">
                    <div class="title">
                      <p>Case Manager</p>
                    </div>
                  </div>
                  <div class="details">
                    <p>The Roles of the Case Manager</p>
                  </div></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding" id="widget">
    <div class="no-padding" id="widget_information">
      <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
        <div class="aos-item__inner">
          <div class="container container-header">
            <div class="subtitle">
              <h2></h2>
            </div>
          </div>
          <div class="container">
            <div class="quote">
              <blockquote>
                <p class="mt-1">Research has proven that drug court judges have a higher level of satisfaction in their career and feel more positive about the court system and its effectiveness.</p>
              </blockquote>
            </div>
            <div class="text text-gray"><small class="italic did-you-know">Did you Know</small></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray2 video-lightbox-section" id="roles_judge">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="container-header">
            <div class="title"><span class="subtitle">The Roles of the Adult Drug Treatment Court Judge</span></div>
          </div>
          <div class="card">
            <div class="content">
              <div class="split">
                <div class="content">
                  <div class="description left margin container-header">
                    <div class="text text-dark">
                      <p>An Adult Drug Treatment Court Judge presides over non-adversarial court appearances for a drug treatment court docket and leads the drug treatment court team in creating a participant focused recovery program.</p>
                      <p>There are two paths to becoming a presiding Judge for Drug treatment Court in New York State. Typically, a Judge can either volunteer or be assigned by the administrative judge. Nonjudicial officers usually report directly to a Judge and require judicial authorization for actions that affect participants’ liberty interests such as jail sanctions or discharge from the program.</p>
                      <p>The Judge presides over the Drug treatment Court for no less than two consecutive years to maintain continuity of the program and ensure the judge is knowledgeable about Drug treatment Court policies and procedures.</p>
                      <p>The Judge regularly attends pre-court staff meetings during which each participant’s progress is reviewed and potential consequences for performance are discussed by the Drug treatment Court team.</p>
                    </div>
                  </div>
                  <div class="pt-5 section bg-white" id="begin_courseJudge">
                    <div class="content text-dark">
                      <div class="text">
                        <p>Click on the image to hear from other colleagues in New York State to learn more about each role before beginning the course.</p>
                        <p class="bold">Begin Drug Treatment Court Judge eLearning Course</p>
                      </div>
                      <div class="mt-1"><a class="btn btn-sm btn-primary outlined" href="https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=577b6f32-d7d3-41c7-a856-fd30e7f09141" target="blank">Get Started</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="videoWrapper media">
                  <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                    <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                    <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/IMG_2034.jpg">
                      <source id="webm" src="src/media/videos/Judge.mp4" type="video/webm">
                    </video>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray video-lightbox-section" id="roles_coordinator">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="container-header">
            <div class="title"><span class="subtitle">The Roles of the Adult Drug Treatment Court Coordinator</span></div>
          </div>
          <div class="card">
            <div class="split">
              <div class="content">
                <div class="description left margin container-header">
                  <div class="text text-dark">
                    <p>A Coordinator oversees the activity of the team, conducts quality assurance of each team member, maintains client data, remains informed regarding grant budgetary concerns of the drug treatment court and coordinates services from each discipline, and the local community, in a manner that is most therapeutic to the drug treatment court participant. </p>
                    <p>Typically, the Coordinator is a court staff position. However, some Adult Drug Treatment Courts may employ staff such as a Case Manager, or Clinician as the Coordinator.</p>
                    <p>Among many other duties, the coordinator is responsible for maintaining accurate and timely records and documentation for the program, overseeing fiscal and contractual obligations, facilitating communication between team members and partner agencies, ensuring policies and procedures are followed, overseeing collection of performance and outcome data, scheduling court sessions and staff meetings, and orienting new hires.  </p>
                  </div>
                </div>
                <div class="pt-5 section bg-white" id="begin_courseCoordinator">
                  <div class="content text-dark">
                    <div class="text">
                      <p>Click on the image to hear from other colleagues in New York State to learn more about each role before beginning the course.</p>
                      <p class="bold">Begin Drug Treatment Court Coordinator eLearning Course</p>
                    </div>
                    <div class="mt-1"><a class="btn btn-sm btn-primary outlined" href="https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=5f8810df-02ae-46b6-90e7-fa11b2f27922" target="blank">Get Started</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="videoWrapper media">
                <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                  <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/IMG_1991.jpg">
                    <source id="webm" src="src/media/videos/What Makes An Effective Drug Court Team Member NEW.mp4" type="video/webm">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray2 video-lightbox-section" id="roles_prosecutor">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="container-header">
            <div class="title"><span class="subtitle">The Roles Of The Prosecutor</span></div>
          </div>
          <div class="card">
            <!---->
            <div class="split">
              <div class="content">
                <div class="description left margin container-header">
                  <div class="text text-dark">
                    <p>An Adult Drug Treatment Court Prosecutor should use a range of objective eligibility criteria to identify potential participants based on the best practice standard of high-risk high need target population requirements.</p>
                    <p>Typically, an assistant district attorney serves on the team. Among other duties, the prosecutor advocates on behalf of public safety, victim interests, and holding participants accountable for meeting their obligations in the program. The prosecutor may also help to resolve other pending legal cases that impact participants’ legal status or eligibility for Drug Court.</p>
                  </div>
                </div>
                <div class="pt-5 section bg-white" id="begin_courseProsecutor">
                  <div class="content text-dark">
                    <div class="text">
                      <p>Click on the image to hear from other colleagues in New York State to learn more about each role before beginning the course.</p>
                      <p class="bold">Begin Drug Treatment Court Prosecutor eLearning Course</p>
                    </div>
                    <div class="mt-1"><a class="btn btn-sm btn-primary outlined" href="https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=04e836d5-aa21-4612-8e01-61450d6f9df2" target="blank">Get Started</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="videoWrapper media">
                <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                  <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/IMG_1948.jpg">
                    <source id="webm" src="src/media/videos/Prosecutor.mp4" type="video/webm">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray video-lightbox-section" id="roles_defense_counsel">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="container-header">
            <div class="title"><span class="subtitle">The Roles Of The Defense Counsel</span></div>
          </div>
          <div class="card">
            <!---->
            <div class="split">
              <div class="content">
                <div class="description left margin container-header">
                  <div class="text text-dark">
                    <p>An Adult Drug Treatment Court Defense Counsel informs the drug court participant about the rigors of drug court, preserves all legal rights of the client, advocates for fair and equal treatment of client, participates in team meetings and attends non-adversarial court proceedings.</p>
                    <p>Typically, an assistant public defender or private defense attorney specializing in Drug treatment Court cases serves on the team. Among other duties, the defense attorney ensures participants’ constitutional rights are protected and advocates for participants stated legal interests.</p>
                  </div>
                </div>
                <div class="pt-5 section bg-white" id="begin_courseDefense Counsel">
                  <div class="content text-dark">
                    <div class="text">
                      <p>Click on the image to hear from other colleagues in New York State to learn more about each role before beginning the course.</p>
                      <p class="bold">Begin Drug Treatment Court Defense Counsel eLearning Course</p>
                    </div>
                    <div class="mt-1"><a class="btn btn-sm btn-primary outlined" href="https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=1c3bcbdb-89e1-4b65-be37-306d0e44355b" target="blank">Get Started</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="videoWrapper media">
                <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                  <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/IMG_1882.jpg">
                    <source id="webm" src="src/media/videos/Defense Counsel.mp4" type="video/webm">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>   
  <section class="lg-padding bg-gray2 video-lightbox-section" id="roles_treatment_provider">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="container-header">
            <div class="title"><span class="subtitle">The Roles Of The Treatment Provider</span></div>
          </div>
          <div class="card">
            <!---->
            <div class="split">
              <div class="content">
                <div class="description left margin container-header">
                  <div class="text text-dark">
                    <p>An Adult Drug Court Treatment Provider delivers rehabilitative therapy sessions, drug screening, case management and monitoring for drug court participants in keeping with the holistic recovery of the drug court participant. </p>
                    <p>Additionally, within the bounds of ethics and legalities, a drug court treatment provider shares information regarding the progress of a participant in appropriate settings to all drug court team members.</p>
                  </div>
                </div>
                <div class="pt-5 section bg-white" id="begin_courseTreatment Provider">
                  <div class="content text-dark">
                    <div class="text">
                      <p>Click on the image to hear from other colleagues in New York State to learn more about each role before beginning the course.</p>
                      <p class="bold">Begin Drug Treatment Court Treatment Provider eLearning Course</p>
                    </div>
                    <div class="mt-1"><a class="btn btn-sm btn-primary outlined" href="https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=e2bf2ff9-cad8-472d-9078-3c48b614967b" target="blank">Get Started</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="videoWrapper media">
                <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                  <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/IMG_2058.jpg">
                    <source id="webm" src="src/media/videos/Clinician NEW.mp4" type="video/webm">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray" id="roles_case_manager">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="container-header">
            <div class="title"><span class="subtitle">The Roles Of The Case Manager</span></div>
          </div>
          <div class="card">
            <!---->
            <div class="split">
              <div class="content">
                <div class="description left margin container-header">
                  <div class="text text-dark">
                    <p>Typically, a substance use disorder counselor, social worker, psychologist, or clinical case manager serves on the team. In many Drug Courts, participants can be referred to multiple treatment agencies or providers for substance use disorder treatment and other complementary services such as mental health counseling or vocational rehabilitation.</p>
                  </div>
                </div>
                <div class="pt-5 section bg-white" id="begin_courseCase Manager">
                  <div class="content text-dark">
                    <div class="text">
                      <p>Click on the image to hear from other colleagues in New York State to learn more about each role before beginning the course.</p>
                      <p class="bold">Begin Drug Treatment Court Case Manager eLearning Course</p>
                    </div>
                    <div class="mt-1"><a class="btn btn-sm btn-primary outlined" href="https://cloud.scorm.com/sc/InvitationConfirmEmail?publicInvitationId=d5af0ba8-57c5-440e-9f14-e52bfc8cc55c" target="blank">Get Started</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="videoWrapper media">
                <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                  <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/IMG_2054.jpg">
                    <source id="webm" src="src/media/videos/(Team_Member_Roles)_-_UPDATED_Case_Manager with captions.mp4" type="video/webm">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray2" id="use_of_complementary_services">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="container-header">
            <div class="title"><span class="subtitle">The Use of Complementary Services</span></div>
          </div>
          <div class="card">
            <div class="content">
              <div class="split">
                <div class="content">
                  <div class="description left margin">
                    <p>The Drug Court provides or refers participants for treatment and social services to address conditions that are likely to interfere with their response to substance use disorder treatment or other Drug Court services to increase criminal recidivism or to diminish long-term treatment gains. Drug Courts are more effective and cost-effective when they offer complementary treatment and social services to address these co-occurring needs. Complementary services are in response to individual assessed needs and may include:</p>
                    <div class="paragraph">
                      <p>●	Housing assistance </p>
                      <p>●	Mental health treatment </p>
                      <p>●	Trauma-informed services</p>
                      <p>●	Criminal-thinking interventions</p>
                      <p>●	Family or interpersonal counseling</p>
                      <p>●	Vocational or educational services</p>
                      <p>●	Medical or dental treatment</p>
                    </div>
                    <p>Let’s hear from a NYS Case Manager regarding these complementary services and why it’s important to provide access to these services for participants.</p>
                  </div>
                </div>
                <div class="videoWrapper media">
                  <div class="video-holder d-flex-centered" id="spokeVideoHolder"><img src="src/img/uploads/complementary.png"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <input type="checkbox" id="target-modal">
  <div class="modal">
    <div class="modal-inner">
      <label class="close-modal" for="target-modal"></label>
      <div class="contact" id="contact">
        <form class="contact-form" action="#" id="contact">
          <h5 class="title">Contact Us</h5>
          <p class="description mb-5">Feel free to contact us if you need any assistance, any help or another question.</p>
          <Fieldset>
            <input type="text" id="name" placeholder="Your name" required autofocus tabindex="1">
          </Fieldset>
          <Fieldset>
            <input type="text" id="email" placeholder="Your email" required tabindex="2">
          </Fieldset>
          <Fieldset>
            <textarea placeholder="Your message" required tabindex="3"> </textarea>
          </Fieldset>
          <div class="button-group d-flex-centered"><a class="btn btn-lg btn-primary send_mail">Send Message</a></div>
        </form>
      </div>
    </div>
    <label class="overlay-modal" for="target-modal"></label>
  </div>




@endsection
