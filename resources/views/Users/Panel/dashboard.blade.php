@extends('Users.Layout.main')
@section('title')
    Dashboard
@endsection
@section('page')
    @php
        $page = 'dashboard'
    @endphp
@endsection
@section('content')
<section class="lg-padding mt-3 mb-5" id="intro">
    <div class="aos-item" data-aos="fade-down" data-aos-duration="250" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="title text-dark container"> <img src="src/img/icon/fountain-icon-blue.svg" type="svg">
            <h1>Welcome to Fountain</h1>
          </div>
          <div class="container text mt-5"> 
            <p class="text-dark">“Only by defining the bounds of acceptable and exceptional practices will Drug Courts be in a position to  disown poor-quality or harmful programs and set effective benchmarks for new and  existing programs to achieve. “</p><small class="text-gray">— Adult Drug Court Best Practice Standards, Volume I (NADCP, 2013; p. 1) —</small>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="lg-padding bg-gray2 video-lightbox-section" id="toolkit_about">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="split container">
            <div class="content">
              <div class="container-header description left margin text-dark">
                <div class="subtitle mt-2">
                  <h2>What is the Toolkit All About</h2>
                </div>
                <div class="text mt-5">
                  <p>As an important member of the adult drug treatment court team, it is imperative to have a general understanding of the process and how team members work cohesively to effectively support the rehabilitation and compel persons with a substance use disorder who are charged with serious crimes to change their lives.</p>
                </div>
              </div>
            </div>
            <div class="videoWrapper media">
              <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/toolkit_updated.PNG">
                  <source id="webm" src="src/media/videos/Dr._Sean_Bailey_-_Toolkit_Welcome_Video.mp4" type="video/webm">
                </video>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray video-lightbox-section" id="effective_team_member">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="container">
            <div class="split">
              <div class="content">
                <div class="description left margin text-dark">
                  <div class="container-header">
                    <div class="subtitle"><span>How do Adult Drug Treatment Courts differ from other court systems?</span></div>
                  </div>
                  <div class="text text-dark mt-4">
                    <p class="bold">Watch The Honorable Judge Joseph Gubbay and team members of the Brooklyn Drug Treatment Court speak candidly about this question.</p>
                    <p>Adult Drug treatment Courts combine treatment and accountability to support and compel persons with a substance use disorder who are charged with serious crimes to change their lives.</p>
                    <p>The impact of the adult drug treatment court process is evident in the success of its participants from over the thousands of drug courts operating throughout the United States. As the process has been studied by the scientific community, there is overwhelming evidence that the use of adult drug treatment courts significantly reduces drug use and crime with less cost than any other justice strategy.</p>
                  </div>
                </div>
              </div>
              <div class="videoWrapper media">
                <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                  <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/IMG_1900.jpg">
                    <source id="webm" src="src/media/videos/How Does Treatment Court Differ NEW.mp4" type="video/webm">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray2 video-lightbox-section" id="effective_team_member">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="container">
            <div class="split">
              <div class="content">
                <div class="description left margin text-d">
                  <div class="container-header">
                    <div class="subtitle"><span>Drug Treatment Courts came to be as a result of a clear need in the justice system.</span></div>
                  </div>
                  <div class="text text-dark mt-4">
                    <p class="bold">Watch The Honorable Judge Betty Calvo-Torres of the Buffalo Drug Treatment Court offer insight about this question.</p>
                    <p>These courts are a critical point of intervention for team members to identify risks and link participants to resources and treatment. </p>
                    <p>Adult Drug Treatment Courts came to be after the need was identified as the missing link in an overwhelmed judicial system. The cycle of incarceration among participants in drug charges was evident that the previous process was not effective. Additionally, the use of drug courts aids in prevention of overwhelming the correctional system with incarcerated individuals.</p>
                    <p>For more information regarding the origins of Drug Treatment Courts visit <a href="http://ww2.nycourts.gov/courts/problem_solving/drugcourts/index.shtml" target="_blank">NY Courts.gov</a></p>
                  </div>
                </div>
              </div>
              <div class="videoWrapper media">
                <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                  <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/IMG_1982.jpg">
                    <source id="webm" src="src/media/videos/A result of a clear need in the justice system.mp4" type="video/webm">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray video-lightbox-section" id="effective_team_member">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="container">
            <div class="split">
              <div class="content">
                <div class="description left margin text-dark">
                  <div class="container-header">
                    <div class="subtitle"><span>What Makes an Effective Adult Drug Court Team Member?</span></div>
                  </div>
                  <div class="text text-dark mt-4"> 
                    <p class="bold">Watch the Hon. Judge Craig Hannah speak to this question when recently asked.</p>
                    <p>A dedicated multidisciplinary team of professionals manages the day-to-day operations of the Adult Drug Treatment Court, including reviewing participant progress during pre-court staff meetings and status hearings, contributing observations and recommendations within team members’ respective areas of expertise, and overseeing the connection of legal, treatment, and supervision services.</p>
                    <p>including reviewing participant progress during pre-court staff meetings and status hearings, contributing observations and recommendations within team members’ respective areas of expertise, and delivering or overseeing the delivery of legal, treatment and supervision services.</p>
                    <p>The ultimate effectiveness within a Drug Court team is their ability to communicate early and often, sacrifice ego and personal achievement for the sake of the participants, and come together as a unit with the common goal of helping the participant lead a successful life towards substance use disorder recovery.</p>
                  </div>
                </div>
              </div>
              <div class="videoWrapper media">
                <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                  <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/IMG_1991_new.PNG">
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
  <div id="lightbox"><i class="fas fa-times" id="close-btn"></i>
    <div id="video-wrapper">
      <video id="video" height="540" width="960" controls="controls">
        <source src="src/media/videos/What Makes An Effective Drug Court Team Member NEW.mp4" type="video/mp4"/>
        <p>Your browser does not support the video tag.</p>
      </video>
    </div>
  </div>
  <section class="no-padding parallax" id="court_protocol" style="background-image: url(src/img/uploads/IMG_2040.jpg)">
    <div class="mb_parallax_overlay">
      <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
        <div class="aos-item__inner">
          <div class="container">
            <div class="container">
              <div class="content">
                <div class="description left margin text-white">
                  <div class="container-header">
                    <div class="subtitle"><span>Court Protocol</span></div>
                  </div>
                  <div class="text text-white mt-4">
                    <p>Not sure of the specific areas of the courtroom and who does what?</p>
                    <p>💡 Take a <a href="https://momento360.com/e/u/4d4f3ed506ff4b16874b63819cb9d6c6?utm_campaign=embed&utm_source=other&heading=-80.03&pitch=-1.7&field-of-view=100&size=medium&autoplay-annotations=true" target="_blank">virtual tour </a> of an Adult Drug Treatment Court to learn more.</p>
                  </div>
                  <div class="buttons mt-4"><a class="btn btn-lg btn-white outlined" href="https://momento360.com/e/u/4d4f3ed506ff4b16874b63819cb9d6c6?utm_campaign=embed&utm_source=other&heading=-80.03&pitch=-1.7&field-of-view=100&size=medium&autoplay-annotations=true" target="_blank" rel="noopener noreferrer">Take a Tour</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray video-lightbox-section" id="client_protocol">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="split">
            <div class="card">
              <div class="videoWrapper media">
                <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                  <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/dress_for_success.png">
                    <source id="webm" src="src/media/videos/Trauma-Informed Policies UPDATED.mp4" type="video/webm">
                  </video>
                </div>
              </div>
              <div class="content mt-2">
                <div class="left margin text-dark">
                  <div class="container-header">
                    <div class="subtitle"><span>Creating Trauma Informed Spaces</span></div>
                  </div>
                  <div class="text text-dark mt-4">
                    <p>The courtroom setting for many who are justice involved is an environment that can exacerbate trauma-related issues. As a court practitioner it is important to utilize person centered care policies and practices to inform your program, and organization to actively avoid re-traumatization in court participants. The goal to create spaces that are welcoming , that demonstrate a safe and trusting environment for participants , while at the same time not interfering with the court and practitioners’ ability create routines, reach goals, and overall operations.</p>
                    <p>To review more information on creating trauma informed spaces, 
                      <mark><a target="blank" href="https://docs.google.com/presentation/d/1igoodieeCaYMK70yquXdmPtAcgKVmjtb/edit#slide=id.p1">reference here</a></mark>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="videoWrapper media">
                <div class="video-holder d-flex-centered" id="spokeVideoHolder">
                  <button class="button-play" id="button"><i class="fa fa-play" aria-hidden="true"></i></button>
                  <video class="video" id="spokeVideo" controls playsinline poster="src/img/uploads/pharmacology.jpeg">
                    <source id="webm" src="src/media/videos/Pharmacology NEW.mp4" type="video/webm">
                  </video>
                </div>
              </div>
              <div class="content mt-2">
                <div class="left margin text-dark">
                  <div class="container-header">
                    <div class="subtitle"><span>Basics of Pharmacology in Drug Treatment</span></div>
                  </div>
                  <div class="text text-dark mt-4">
                    <p>Research shows that combining behavioral therapy with medications, if available, is the best way to ensure success for most participants. The combination of medications and behavioral interventions to treat a substance use disorder is known as medication-assisted treatment (MAT). </p>
                    <p class="italic">Click the image to listen to Adult Drug Treatment Court Clinical Professional talk about this topic.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="content">
                <div class="media"><img src="src/img/uploads/justice_system.jpeg"></div>
              </div>
              <div class="content mt-2">
                <div class="left margin container-header">
                  <div class="container-header">
                    <div class="subtitle"><span>NYS Criminal Justice System</span></div>
                  </div>
                  <div class="text text-dark mt-4">
                    <p><strong>An Overview</strong></p>
                    <p>The NYS DCJS primarily serves as a resource for law enforcement professionals and those working in the criminal justice sector and public safety sector whom provide services for victims of crimes, offenders, and former offenders.For more information on New York State Criminal Justice system and structure</p>
                    <p>
                      <mark><a href="https://bit.ly/3JPsOVS" target="_blank">visit here</a></mark>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding" id="criminal_justice_system_widget">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <!--              -->
          <div class="pt-5">
            <div class="split">
              <div class="card"><a href="/Roles#roles_judge">
                  <div class="media"><img src="src/img/uploads/IMG_1881.jpg"/></div>
                  <div class="content mt-1">
                    <div class="title mb-1">
                      <h5>Judge</h5>
                    </div>
                    <div class="text text-dark">
                      <p>Research has proven that drug court judges have a higher level of satisfaction in their career and feel more positive about the court system and its effectiveness.</p>
                    </div>
                    <div class="text-light-gray d-flex-centered animate-arrow"><i class="fas fa-chevron-down"></i></div>
                  </div></a></div>
              <div class="card"><a href="/Roles#roles_coordinator">
                  <div class="media"><img src="src/img/uploads/IMG_1902.jpg"/></div>
                  <div class="content mt-1">
                    <div class="title mb-1">
                      <h5>Coordinator</h5>
                    </div>
                    <div class="text text-dark">
                      <p>A drug court coordinator oversees the activity of the team, conducts quality assurance of each  team member, maintains client data, and many other functions.</p>
                    </div>
                    <div class="text-light-gray d-flex-centered animate-arrow"><i class="fas fa-chevron-down"></i></div>
                  </div></a></div>
              <div class="card"><a href="/Roles#roles_prosecutor">
                  <div class="media"><img src="src/img/uploads/IMG_1948.jpg"/></div>
                  <div class="content mt-1">
                    <div class="title mb-1">
                      <h5>Prosecutor</h5>
                    </div>
                    <div class="text text-dark">
                      <p>A drug court prosecutor is usually a “gate keeper” and selects substance use disorder person’s to participate in the  treatment program.</p>
                    </div>
                    <div class="text-light-gray d-flex-centered animate-arrow"><i class="fas fa-chevron-down"></i></div>
                  </div></a></div>
            </div>
            <div class="split">
              <div class="card"><a href="/Roles#roles_defense_counsel">
                  <div class="media"><img src="src/img/uploads/IMG_1961.jpg"/></div>
                  <div class="content mt-1">
                    <div class="title mb-1">
                      <h5>Defense Counsel</h5>
                    </div>
                    <div class="text text-dark">
                      <p>A drug court defense counsel informs the drug court participant about the rigors of drug court,  preserves all legal rights of the client, and advocates for fair and equal treatment of the client.</p>
                    </div>
                    <div class="text-light-gray d-flex-centered animate-arrow"><i class="fas fa-chevron-down"></i></div>
                  </div></a></div>
              <div class="card"><a href="/Roles#roles_treatment_provider">
                  <div class="media"><img src="src/img/uploads/IMG_1881.jpg"/></div>
                  <div class="content mt-1">
                    <div class="title mb-1">
                      <h5>Treatment Provider</h5>
                    </div>
                    <div class="text text-dark">
                      <p>A drug court treatment provider provides rehabilitative therapy sessions, drug screening, case  management and monitoring for drug court participants in keeping with the holistic recovery of  the drug court participant.</p>
                    </div>
                    <div class="text-light-gray d-flex-centered animate-arrow"><i class="fas fa-chevron-down"></i></div>
                  </div></a></div>
              <div class="card"><a href="/Roles#roles_case_manager">
                  <div class="media"><img src="src/img/uploads/IMG_1902.jpg"/></div>
                  <div class="content mt-1">
                    <div class="title mb-1">
                      <h5>Case Manager</h5>
                    </div>
                    <div class="text text-dark">
                      <p>In many Drug Courts, participants can be referred to multiple treatment agencies or providers for substance abuse treatment and other complementary services such as mental health counseling or vocational rehabilitation.</p>
                    </div>
                    <div class="text-light-gray d-flex-centered animate-arrow"><i class="fas fa-chevron-down"></i></div>
                  </div></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="line_hr"></div>
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
 
        <div id="toast">
            <p class="bold">Welcome to Dashboard</p>
            <p></p>
          </div>
    </section>


@endsection


