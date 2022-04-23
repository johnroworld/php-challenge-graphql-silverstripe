# Mighty Mind PHP/SilverStripe/GraphQL Challenge

This code challenge will test your:

- Ability to think on the spot
- Communication skills and ability to talk through your code with others
- Logical thought processes
- This coding challenge designed to be completed in 4 hours
- Yuo can extend the work over the limit of 4 hours on the challenge if you wish to elaborate it further.

## Writing your code

Please look at the Schema Attached to this challenge. It will need to be served via a GraphQL endpoint. Authentication is required.

You are encouragd to use the GraphQL Add-On for SilverStripe:

[GraphQL Add-On](https://addons.silverstripe.org/add-ons/silverstripe/graphql)

## Install Docker engine

[Docker Install Documentation](https://docs.docker.com/engine/install/)

When Writing your code, please be mindful of the following:

-use php code sniffer for php linting
-use editorconfig for editor configuration
-use composer to unstall new libraries

The code must be submitted to public repo in gitlab and a live version has to be deployed on gitlab pages

Please add the public link to the README.md file on your codebase, and any other instructions about how to run the code

## Installation

Install Docker on your machine.

Clone this repo on your local machine.

```

## Usage

# Get into the cloned repo folder
cd PHPChallenge/

# run docker-compose to spinup the environments
~/PHPChallenge/$  docker-compose up -d

# Reach the mightyminds Silverstripe document root
cd MightyMindsRoot/MightyMinds/

# Install the Libraries
composer install

~/PHPChallenge/MightyMindsRoot/MightyMinds/$ composer install

# .env file it is required by silverstripe to connect to the proper resources.

```
# DB credentials

SS_DATABASE_CLASS="MySQLDatabase"

SS_DATABASE_SERVER="172.22.0.2"

SS_DATABASE_USERNAME="root"

SS_DATABASE_PASSWORD="domenico123"

SS_DATABASE_PORT="3306"

SS_DATABASE_NAME="mightymindsdb"

SS_DEFAULT_ADMIN_USERNAME="admin"

SS_DEFAULT_ADMIN_PASSWORD="domenico123"

# WARNING: in a live environment, change this to "live" instead of dev

SS_ENVIRONMENT_TYPE="dev"
```




```

## The Type Definitions

```
type Home {
    Contents: Contents
  }

  type Contents {
    Header: Header
    SidebarWidgets: [SidebarWidgets]
    Body: Body
  }

  type Body {
    Title: String
    Subtitle: String
    Links: [Links]
    BodyLinks: [BodyLinks]
  }

  type Links {
    label: String
    url: String
    type: String
    icon: String
    color: String
  }
  type infobar {
    icon: String
    year: String
    classname: String
  }

  type GridUrls {
    label: String
    url: String
    type: String
    icon: String
    color: String
  }

  type BottomLinks {
    label: String
    url: String
    type: String
    icon: String
    color: String
  }
  type ContextMenu {
    label: String
    url: String
    type: String
    icon: String
    color: String
  }

  type ClassesData {
    SchoolID: String
    ClassID: String
    Title: String
    icon: String
    color: String
    starred: Boolean
    archived: Boolean
    infobar: infobar
    WeekActivities: String
  }

  type classMenus {
    urls: [GridUrls]
    bottomLinks: [BottomLinks]
    ContextMenu: [ContextMenu]
  }

  type BodyLinks {
    label: String
    url: String
    icon: String
  }

  type SidebarWidgets {
    Title: String
    icon: String
    Template: String
    ImgUrl: String
    Text: String
    urls: [WidgetURLS]
  }

  type WidgetURLS {
    type: String
    label: String
    url: String
    icon: String
  }

  type Header {
    Report: [Report]
    WelcomeMessage: String
    urls: [url]
    Title: String
    icon: String
  }
  type url {
    type: String
    label: String
    url: String
    icon: String
    color: String
    submenu: [submenu]
    modal: String
  }

  type Report {
    Title: String
    Data: [Data]
  }

  type Data {
    label: String
    value: String
    color: String
  }

  type TopMenu {
    main: [main]
    help: [help]
  }
  type ProfileMenu {
    label: String
    url: String
    type: String
    icon: String
  }
  type main {
    label: String
    url: String
    type: String
    icon: String
    submenu: [submenu]
  }
  type dropdown {
    option: String
    value: String
  }
  type submenu {
    label: String
    url: String
    type: String
    icon: String
  }
  type help {
    label: String
    url: String
    type: String
    icon: String
  }

  type Teachers {
    ID: ID
    lastname: String
    firstname: String
  }

  type Session {
    isTeacher: Boolean
    user: user
    schoolSubscriptions: schoolSubscriptions
    csrf: String
    schoolCourses: Boolean
    message: String
    isAcademicForce: Boolean
    redirectUrl: String
  }

  type schoolSubscriptions {
    current: [String]!
    all: [String]!
  }
  type dropdowns {
    year: [dropdown]
    subjects: [dropdown]
  }

  type createNewClasses {
    dropdowns: dropdowns
    title: String
    buttons: [BottomLinks]
  }
  type bodyActions {
    title: String
    text: String
    icon: String
    action: String
  }
  type assignActivity {
    title: String
    bodyText: String
    bodyActions: [bodyActions]
  }

  type Modals {
    createNewClasses: createNewClasses
    assignActivity: assignActivity
  }

  type user {
    FirstName: String
    Surname: String
    Email: String
    SchoolName: String
    ID: ID
    SchoolID: ID
    IsSchoolAdmin: Boolean
  }

  type Classes {
    Header: Header
  }

  type ClassesDetails {
    classMenus: classMenus
    data: [ClassesData]
  }

  type Query {
    Session: Session
    Teachers: [Teachers]
    TopMenu: TopMenu
    Home: Home
    Classes: Classes
    ProfileMenu: [ProfileMenu]
    ClassesData: ClassesDetails
    Modals: Modals
  }

```

## The Schema

```

{
  Query: {
    ClassesData: () => {
      return {
        classMenus: {
          urls: [
            {
              label: "Activities due this week",
              url: "week-activities",
              type: "href-withbadge",
              icon: "arrow",
              color: "",
            },
            {
              label: "Assign Activities",
              url: "assign-activities",
              type: "href",
              icon: "arrow",
              color: "",
            },
            {
              label: "Class Calendar",
              url: "class-calendar",
              type: "href",
              icon: "arrow",
              color: "",
            },
            {
              label: "",
              url: "",
              type: "separator",
              icon: "arrow",
              color: "",
            },
          ],
          bottomLinks: [
            {
              label: "Add Student",
              url: "/add-student",
              type: "modal-trigger",
              icon: "plus",
              color: "",
            },
          ],
          ContextMenu: [
            {
              label: "Add Student",
              url: "/add-student",
              type: "modal-trigger",
              icon: "arrow",
              color: "",
            },
            {
              label: "Email Students",
              url: "/email-students",
              type: "href",
              icon: "arrow",
              color: "",
            },
            {
              label: "Download Login Instructions",
              url: "/download-login-instructions",
              type: "href",
              icon: "arrow",
              color: "",
            },
            {
              label: "Login as a student",
              url: "/login-as-a-student",
              type: "href",
              icon: "arrow",
              color: "",
            },
            {
              label: "",
              url: "",
              type: "separator",
              icon: "",
              color: "",
            },
            {
              label: "Rename Class",
              url: "/rename-class",
              type: "href",
              icon: "",
              color: "",
            },
            {
              label: "Change your level",
              url: "/change-your-level",
              type: "href",
              icon: "",
              color: "",
            },
            {
              label: "View class subscription",
              url: "/view-class-subscription",
              type: "href",
              icon: "",
              color: "",
            },
            {
              label: "View class unit plan",
              url: "view-class-unit-plan",
              type: "href",
              icon: "",
              color: "",
            },
            {
              label: "Archive Class",
              url: "/archive-class",
              type: "modal-trigger",
              icon: "",
              color: "",
            },
          ],
        },
        data: [
          {
            SchoolID: 89309,
            ClassID: 456231,
            Title: "12ENGA",
            icon: "classicon",
            color: "#6BC62A",
            starred: true,
            archived: false,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 5,
          },
          {
            SchoolID: 89310,
            ClassID: 456232,
            Title: "12ENGB",
            icon: "classicon",
            color: "#487DF6",
            starred: true,
            archived: false,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 3,
          },
          {
            SchoolID: 89311,
            ClassID: 456233,
            Title: "08MATHS",
            icon: "classicon",
            color: "#F7AD33",
            starred: true,
            archived: false,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 0,
          },
          {
            SchoolID: 89312,
            ClassID: 456234,
            Title: "09SCI",
            icon: "classicon",
            color: "#EF408B",
            starred: true,
            archived: false,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 1,
          },
          {
            SchoolID: 89313,
            ClassID: 456235,
            Title: "09HASS",
            icon: "classicon",
            color: "#6A44D2",
            starred: false,
            archived: false,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 2,
          },
          {
            SchoolID: 89314,
            ClassID: 456236,
            Title: "12ENGA",
            icon: "classicon",
            color: "#F7AD33",
            starred: false,
            archived: false,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 6,
          },
          {
            SchoolID: 89315,
            ClassID: 456237,
            Title: "12ENGA",
            icon: "classicon",
            color: "#487DF6",
            starred: true,
            archived: false,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 1,
          },
          {
            SchoolID: 89308,
            ClassID: 456238,
            Title: "12ENGA",
            icon: "classicon",
            color: "#6BC62A",
            starred: true,
            archived: true,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 5,
          },
          {
            SchoolID: 89307,
            ClassID: 456239,
            Title: "12ENGB",
            icon: "classicon",
            color: "#487DF6",
            starred: true,
            archived: true,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 3,
          },
          {
            SchoolID: 89306,
            ClassID: 456240,
            Title: "08MATHS",
            icon: "classicon",
            color: "#F7AD33",
            starred: true,
            archived: true,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 0,
          },
          {
            SchoolID: 89305,
            ClassID: 456241,
            Title: "09SCI",
            icon: "classicon",
            color: "#EF408B",
            starred: true,
            archived: true,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 1,
          },
          {
            SchoolID: 89304,
            ClassID: 456242,
            Title: "09HASS",
            icon: "classicon",
            color: "#6A44D2",
            starred: false,
            archived: true,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 2,
          },
          {
            SchoolID: 89303,
            ClassID: 456243,
            Title: "12ENGA",
            icon: "classicon",
            color: "#F7AD33",
            starred: false,
            archived: true,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 6,
          },
          {
            SchoolID: 89302,
            ClassID: 456244,
            Title: "12ENGA",
            icon: "classicon",
            color: "#487DF6",
            starred: true,
            archived: true,
            infobar: {
              icon: "star",
              year: "Year 12",
              classname: "English",
            },
            WeekActivities: 1,
          },
        ],
      };
    },
    ProfileMenu: () => {
      return [
        {
          label: "My Profile",
          url: "/my-profile",
          type: "href",
          icon: "arrow",
        },
        {
          label: "My School's Details",
          url: "/my-school-details",
          type: "href",
          icon: "arrow",
        },
        {
          label: "Licence Agreement",
          url: "/licence-agreement",
          type: "href",
          icon: "arrow",
        },
        {
          label: "Policy Privacy",
          url: "/policy-privacy",
          type: "href",
          icon: "arrow",
        },
        {
          label: "",
          url: "/",
          type: "separator",
          icon: "",
        },
        {
          label: "Change Password",
          url: "/changepassword",
          type: "href",
          icon: "password",
        },
        {
          label: "Logout",
          url: "/logout",
          type: "href",
          icon: "logout",
        },
      ];
    },
    TopMenu: () => {
      return {
        main: [
          {
            label: "home",
            url: "/",
            type: "href",
            icon: "",
          },
          {
            label: "Classes",
            url: "classes",
            type: "href",
            icon: "",
          },
          {
            label: "Planner",
            url: "planner",
            type: "href",
            icon: "",
            submenu: [
              { label: "Calendar", url: "calendar", type: "href", icon: "calendar" },
              { label: "Activities", url: "activities", type: "href", icon: "activities" },
              { label: "Programs", url: "programs", type: "href", icon: "programs" },
              { label: "Unit Plans", url: "unit-plans", type: "href", icon: "plans" },
            ],
          },
          {
            label: "School Data",
            url: "schooldata",
            type: "href",
            icon: "",
          },
          {
            label: "Library",
            url: "library",
            type: "href",
            icon: "",
          },
        ],
        help: [
          {
            label: "Help Center",
            url: "helpcenter",
            type: "href",
            icon: "help",
          },
        ],
      };
    },
    Classes: () => {
      return {
        Header: {
          Title: "Classes",
          icon: "inventory",
          urls: [
            {
              type: "button-gray",
              label: "Create New Class",
              url: "/create-new-class",
              icon: "plus",
              color: "gray",
              modal: "CreateNewClass",
            },
            {
              type: "button-gray",
              label: "Add Students to My Schools",
              url: "/add-students-to-my-schools",
              icon: "plus",
              color: "gray",
              modal: "SelectAddStudentOption",
            },
            {
              type: "button-blue",
              label: "Request Bulk Importng",
              url: "/request-bulk-importing",
              icon: "",
              color: "primary",
              modal: "",
            },
          ],
        },
      };
    },
    Home: () => {
      return {
        Contents: {
          Header: {
            Report: [
              {
                Title: "Week 4 Activity Summary",
                Data: [
                  {
                    label: "Due This week",
                    value: 330,
                    color: "blue",
                  },
                  {
                    label: "Completed",
                    value: 240,
                    color: "green",
                  },
                  {
                    label: "Overdue",
                    value: 33,
                    color: "red",
                  },
                ],
              },
            ],
            WelcomeMessage: "Welcome Back, ",
            urls: [
              {
                type: "button",
                label: "My Calendar",
                url: "/my-calendar",
                icon: "plus",
                color: "secondary",
              },
              {
                type: "button",
                label: "Weekly Report",
                url: "/weekly-report",
                icon: "plus",
                color: "secondary",
              },
              {
                type: "button-submenu",
                label: "Assign Activity",
                url: "/assign-activity",
                icon: "plus",
                color: "primary",
                submenu: [
                  {
                    label: "Assign Activity",
                    url: "/my-profile",
                    type: "href",
                    icon: "arrow",
                  },
                  {
                    label: "Start a Live Challenge",
                    url: "/my-school-details",
                    type: "href",
                    icon: "arrow",
                  },
                  {
                    label: "Present Activities and Theory",
                    url: "/licence-agreement",
                    type: "href",
                    icon: "arrow",
                  },
                  {
                    label: "Request Activities",
                    url: "/policy-privacy",
                    type: "href",
                    icon: "arrow",
                  },
                ],
              },
            ],
          },
          SidebarWidgets: [
            {
              Title: "Explore Your New Portal",
              icon: "",
              Template: "graphic",
              ImgUrl: "/assets/images/Onboarding.svg",
              Text: "Improve Class focus, unit plans, live lessons, additional tracking features and much more",
              urls: [
                {
                  type: "button",
                  label: "See how it works",
                  url: "/how-it-works",
                  icon: "",
                  color: "",
                },
                {
                  type: "href",
                  label: "Getting Started Guide",
                  url: "/getting-started-guide",
                  icon: "",
                  color: "",
                },
              ],
            },
            {
              Title: "Help and Support",
              icon: "Help",
              Template: "textual",
              ImgUrl: "/image/image.png",
              Text: "",
              urls: [
                {
                  type: "separator",
                  label: "",
                  url: "",
                  icon: "",
                  color: "",
                },
                {
                  type: "href",
                  label: "Visit Help Center",
                  url: "/visit-help-center",
                  icon: "arrow",
                  color: "",
                },
                {
                  type: "href",
                  label: "Send us your feedback",
                  url: "/send-us-feedback",
                  icon: "arrow",
                  color: "",
                },
                {
                  type: "href",
                  label: "Make a request or suggestion",
                  url: "/make-request-suggestion",
                  icon: "arrow",
                  color: "",
                },
                {
                  type: "href",
                  label: "Report an Issue",
                  url: "/report-issue",
                  icon: "arrow",
                  color: "",
                },
                {
                  type: "separator",
                  label: "",
                  url: "",
                  icon: "",
                  color: "",
                },
                {
                  type: "href",
                  label: "Teachers Support Group",
                  url: "/teacher-support-group",
                  icon: "arrow",
                  color: "",
                },
                {
                  type: "href",
                  label: "Schedule a Consultation",
                  url: "/schedule-a-consultation",
                  icon: "arrow",
                  color: "",
                },
              ],
            },
          ],
          Body: {
            Title: "Here are your classes",
            Subtitle:
              "Select a class to view this week's assigned activities and begin your lesson.",
            Links: [
              {
                label: "View all classes",
                url: "/classes/",
                type: "href",
                icon: "",
                color: "",
              },
            ],
          },
        },
      };
    },
    Teachers: () => {
      return [
        {
          ID: 51844,
          firstname: "Professor",
          lastname: "Rutigliano",
        },
        {
          ID: 51845,
          firstname: "Professor",
          lastname: "Mastrorillo",
        },
      ];
    },
    Session: () => {
      return {
        isTeacher: true,
        user: {
          FirstName: "Professor",
          Surname: "Rutigliano",
          Email: "rutigliano.teacher@mightyminds.com.au",
          SchoolName: "Old Clever School",
          ID: 51844,
          SchoolID: 1709,
          IsSchoolAdmin: false,
        },
        csrf: "079d945f27e94a4417231f46cda0985559a3fa20",
        schoolSubscriptions: {
          current: ["All", "Cognitive Verbs", "Fundamental Skills"],
          all: ["All", "Cognitive Verbs", "Fundamental Skills"],
        },
        schoolCourses: true,
        message: "",
        isAcademicForce: false,
        redirectUrl: "/login",
      };
    },
    Modals: () => {
      return {
        createNewClasses: {
          dropdowns: {
            year: [
              { option: "12", value: "12" },
              { option: "11", value: "11" },
              { option: "10", value: "10" },
              { option: "09", value: "09" },
              { option: "08", value: "08" },
            ],
            subjects: [
              { option: "Subject1", value: "Subject1" },
              { option: "Subject2", value: "Subject2" },
              { option: "Subject3", value: "Subject3" },
              { option: "Subject4", value: "Subject4" },
              { option: "Subject5", value: "Subject5" },
              { option: "Subject6", value: "Subject6" },
            ],
          },
          title: "Create New Class",
          buttons: [
            {
              label: "Whatch: How to add Classes",
              url: "/how-to-add-classes",
              type: "button",
              icon: "video",
              color: "",
            },
            {
              label: "Cancel",
              url: "#",
              type: "button",
              icon: "cancel",
              color: "",
            },
            {
              label: "Create Class,Next",
              url: "/create-class-next",
              type: "button",
              icon: "next",
              color: "",
            },
          ],
        },
        assignActivity: {
          title: "Choose a starting point",
          bodyText:
            "Looking for the perfect activity? <a href='/classes'>Request a new activity today</a>",
          bodyActions: [
            {
              title: "Mighty Minds Activities",
              text: "Explore pre-made activities, and customise your own",
              icon: "plus",
              action: "#",
            },
            {
              title: "External Activities",
              text: "Assign studentsyour favorite external resource such us videos and websites",
              icon: "/assets/images/321.png",
              action: "#",
            },
            {
              title: "Explore Libraries",
              text: "Search all activities available icluding Mighty Minds and external Activities",
              icon: "/assets/images/activities.png",
              action: "#",
            },
          ],
        },
      };
    },
  },
};

```
