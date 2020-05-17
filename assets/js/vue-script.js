var bus = new Vue({});
var routes = [
  
	{ path: '/student', name: 'studentlist', component: StudentListComponent },
	{ path: '/student/(index|list)', name: 'studentlist' , component: StudentListComponent },
	{ path: '/student/(index|list)/:fieldname/:fieldvalue', name: 'studentlist' , component: StudentListComponent , props: true },
	{ path: '/student/view/:id', name: 'studentview' , component: StudentViewComponent , props: true},
	{ path: '/student/view/:fieldname/:fieldvalue', name: 'studentview' , component: StudentViewComponent , props: true },
	{ path: '/student/add', name: 'studentadd' , component: StudentAddComponent },
	{ path: '/student/edit/:id' , name: 'studentedit' , component: StudentEditComponent , props: true},
	{ path: '/student/edit', name: 'studentedit' , component: StudentEditComponent , props: true},

	{ path: '/user', name: 'userlist', component: UserListComponent },
	{ path: '/user/(index|list)', name: 'userlist' , component: UserListComponent },
	{ path: '/user/(index|list)/:fieldname/:fieldvalue', name: 'userlist' , component: UserListComponent , props: true },
	{ path: '/user/view/:id', name: 'userview' , component: UserViewComponent , props: true},
	{ path: '/user/view/:fieldname/:fieldvalue', name: 'userview' , component: UserViewComponent , props: true },
	{ path: '/account/edit', name: 'accountedit' , component: AccountEditComponent },
	{ path: '/account', name: 'accountview' , component: AccountViewComponent },
	{ path: '/user/add', name: 'useradd' , component: UserAddComponent },
	{ path: '/user/edit/:id' , name: 'useredit' , component: UserEditComponent , props: true},
	{ path: '/user/edit', name: 'useredit' , component: UserEditComponent , props: true},

	{ path: '/teacher', name: 'teacherlist', component: TeacherListComponent },
	{ path: '/teacher/(index|list)', name: 'teacherlist' , component: TeacherListComponent },
	{ path: '/teacher/(index|list)/:fieldname/:fieldvalue', name: 'teacherlist' , component: TeacherListComponent , props: true },
	{ path: '/teacher/view/:id', name: 'teacherview' , component: TeacherViewComponent , props: true},
	{ path: '/teacher/view/:fieldname/:fieldvalue', name: 'teacherview' , component: TeacherViewComponent , props: true },
	{ path: '/teacher/add', name: 'teacheradd' , component: TeacherAddComponent },
	{ path: '/teacher/edit/:id' , name: 'teacheredit' , component: TeacherEditComponent , props: true},
	{ path: '/teacher/edit', name: 'teacheredit' , component: TeacherEditComponent , props: true},

	{ path: '/hostel', name: 'hostellist', component: HostelListComponent },
	{ path: '/hostel/(index|list)', name: 'hostellist' , component: HostelListComponent },
	{ path: '/hostel/(index|list)/:fieldname/:fieldvalue', name: 'hostellist' , component: HostelListComponent , props: true },
	{ path: '/hostel/view/:id', name: 'hostelview' , component: HostelViewComponent , props: true},
	{ path: '/hostel/view/:fieldname/:fieldvalue', name: 'hostelview' , component: HostelViewComponent , props: true },
	{ path: '/hostel/add', name: 'hosteladd' , component: HostelAddComponent },
	{ path: '/hostel/edit/:id' , name: 'hosteledit' , component: HostelEditComponent , props: true},
	{ path: '/hostel/edit', name: 'hosteledit' , component: HostelEditComponent , props: true},

	{ path: '/class', name: 'classlist', component: ClassListComponent },
	{ path: '/class/(index|list)', name: 'classlist' , component: ClassListComponent },
	{ path: '/class/(index|list)/:fieldname/:fieldvalue', name: 'classlist' , component: ClassListComponent , props: true },
	{ path: '/class/view/:id', name: 'classview' , component: ClassViewComponent , props: true},
	{ path: '/class/view/:fieldname/:fieldvalue', name: 'classview' , component: ClassViewComponent , props: true },
	{ path: '/class/add', name: 'classadd' , component: ClassAddComponent },
	{ path: '/class/edit/:id' , name: 'classedit' , component: ClassEditComponent , props: true},
	{ path: '/class/edit', name: 'classedit' , component: ClassEditComponent , props: true},

	{ path: '/new_student', name: 'new_studentlist', component: New_StudentListComponent },
	{ path: '/new_student/(index|list)', name: 'new_studentlist' , component: New_StudentListComponent },
	{ path: '/new_student/(index|list)/:fieldname/:fieldvalue', name: 'new_studentlist' , component: New_StudentListComponent , props: true },
	{ path: '/new_student/view/:id', name: 'new_studentview' , component: New_StudentViewComponent , props: true},
	{ path: '/new_student/view/:fieldname/:fieldvalue', name: 'new_studentview' , component: New_StudentViewComponent , props: true },
	{ path: '/new_student/add', name: 'new_studentadd' , component: New_StudentAddComponent },
	{ path: '/new_student/edit/:id' , name: 'new_studentedit' , component: New_StudentEditComponent , props: true},
	{ path: '/new_student/edit', name: 'new_studentedit' , component: New_StudentEditComponent , props: true},

	{ path: '/result', name: 'resultlist', component: ResultListComponent },
	{ path: '/result/(index|list)', name: 'resultlist' , component: ResultListComponent },
	{ path: '/result/(index|list)/:fieldname/:fieldvalue', name: 'resultlist' , component: ResultListComponent , props: true },
	{ path: '/result/view/:id', name: 'resultview' , component: ResultViewComponent , props: true},
	{ path: '/result/view/:fieldname/:fieldvalue', name: 'resultview' , component: ResultViewComponent , props: true },
	{ path: '/result/add', name: 'resultadd' , component: ResultAddComponent },
	{ path: '/result/edit/:id' , name: 'resultedit' , component: ResultEditComponent , props: true},
	{ path: '/result/edit', name: 'resultedit' , component: ResultEditComponent , props: true},

	{ path: '/payment', name: 'paymentlist', component: PaymentListComponent },
	{ path: '/payment/(index|list)', name: 'paymentlist' , component: PaymentListComponent },
	{ path: '/payment/(index|list)/:fieldname/:fieldvalue', name: 'paymentlist' , component: PaymentListComponent , props: true },
	{ path: '/payment/view/:id', name: 'paymentview' , component: PaymentViewComponent , props: true},
	{ path: '/payment/view/:fieldname/:fieldvalue', name: 'paymentview' , component: PaymentViewComponent , props: true },
	{ path: '/payment/add', name: 'paymentadd' , component: PaymentAddComponent },
	{ path: '/payment/edit/:id' , name: 'paymentedit' , component: PaymentEditComponent , props: true},
	{ path: '/payment/edit', name: 'paymentedit' , component: PaymentEditComponent , props: true},

	{ path: '/class_attendance', name: 'class_attendancelist', component: Class_AttendanceListComponent },
	{ path: '/class_attendance/(index|list)', name: 'class_attendancelist' , component: Class_AttendanceListComponent },
	{ path: '/class_attendance/(index|list)/:fieldname/:fieldvalue', name: 'class_attendancelist' , component: Class_AttendanceListComponent , props: true },
	{ path: '/class_attendance/view/:id', name: 'class_attendanceview' , component: Class_AttendanceViewComponent , props: true},
	{ path: '/class_attendance/view/:fieldname/:fieldvalue', name: 'class_attendanceview' , component: Class_AttendanceViewComponent , props: true },
	{ path: '/class_attendance/add', name: 'class_attendanceadd' , component: Class_AttendanceAddComponent },
	{ path: '/class_attendance/edit/:id' , name: 'class_attendanceedit' , component: Class_AttendanceEditComponent , props: true},
	{ path: '/class_attendance/edit', name: 'class_attendanceedit' , component: Class_AttendanceEditComponent , props: true},

	{ path: '/acounting', name: 'acountinglist', component: AcountingListComponent },
	{ path: '/acounting/(index|list)', name: 'acountinglist' , component: AcountingListComponent },
	{ path: '/acounting/(index|list)/:fieldname/:fieldvalue', name: 'acountinglist' , component: AcountingListComponent , props: true },
	{ path: '/acounting/view/:id', name: 'acountingview' , component: AcountingViewComponent , props: true},
	{ path: '/acounting/view/:fieldname/:fieldvalue', name: 'acountingview' , component: AcountingViewComponent , props: true },
	{ path: '/acounting/add', name: 'acountingadd' , component: AcountingAddComponent },
	{ path: '/acounting/edit/:id' , name: 'acountingedit' , component: AcountingEditComponent , props: true},
	{ path: '/acounting/edit', name: 'acountingedit' , component: AcountingEditComponent , props: true},

	{ path: '/examination', name: 'examinationlist', component: ExaminationListComponent },
	{ path: '/examination/(index|list)', name: 'examinationlist' , component: ExaminationListComponent },
	{ path: '/examination/(index|list)/:fieldname/:fieldvalue', name: 'examinationlist' , component: ExaminationListComponent , props: true },
	{ path: '/examination/view/:id', name: 'examinationview' , component: ExaminationViewComponent , props: true},
	{ path: '/examination/view/:fieldname/:fieldvalue', name: 'examinationview' , component: ExaminationViewComponent , props: true },
	{ path: '/examination/add', name: 'examinationadd' , component: ExaminationAddComponent },
	{ path: '/examination/edit/:id' , name: 'examinationedit' , component: ExaminationEditComponent , props: true},
	{ path: '/examination/edit', name: 'examinationedit' , component: ExaminationEditComponent , props: true},

	{ path: '/galary', name: 'galarylist', component: GalaryListComponent },
	{ path: '/galary/(index|list)', name: 'galarylist' , component: GalaryListComponent },
	{ path: '/galary/(index|list)/:fieldname/:fieldvalue', name: 'galarylist' , component: GalaryListComponent , props: true },
	{ path: '/galary/view/:id', name: 'galaryview' , component: GalaryViewComponent , props: true},
	{ path: '/galary/view/:fieldname/:fieldvalue', name: 'galaryview' , component: GalaryViewComponent , props: true },
	{ path: '/galary/add', name: 'galaryadd' , component: GalaryAddComponent },
	{ path: '/galary/edit/:id' , name: 'galaryedit' , component: GalaryEditComponent , props: true},
	{ path: '/galary/edit', name: 'galaryedit' , component: GalaryEditComponent , props: true},

	{ path: '/home', name: 'home' , component: HomeComponent },
	{ path: '*', name: 'pagenotfound' , component: ComponentNotFound }
];

if(ActiveUser){
	routes.push({ path: '/', name: 'home' , component: HomeComponent })
}
else{
	routes.push({ path: '/', name: 'index', component: IndexComponent })
	routes.push({ path: '/register', name: 'register', component: RegisterComponent })
}

var router = new VueRouter({
	routes:routes,
	linkExactActiveClass:'active',
	linkActiveClass:'active',
	//mode:'history'
});
router.beforeEach(function(to, from, next) {
	document.body.className = to.name;
	
	if(to.name !='index' && to.name !='register' && !ActiveUser){
		next(
			{
				path: '/' , 
				query:{
					redirect:to.path 
				}
			}
		);
	}
	else{
		next();	
	}

});
var config = {
	errorBagName: 'errors', // change if property conflicts
	fieldsBagName: 'fields', 
	delay: 0, 
	locale: '', 
	dictionary: null, 
	strict: true, 
	classes: false, 
	classNames: {
		touched: 'touched', // the control has been blurred
		untouched: 'untouched', // the control hasn't been blurred
		valid: 'valid', // model is valid
		invalid: 'invalid', // model is invalid
		pristine: 'pristine', // control has not been interacted with
		dirty: 'dirty' // control has been interacted with
	},
	events: 'input|blur',
	inject: true,
	validity: false,
	aria: true,
	i18n: null, // the vue-i18n plugin instance,
	i18nRootKey: 'validations', // the nested key under which the validation messsages will be located
};

Vue.use(VeeValidate,config);
Vue.http.interceptors.push(function(request, next) {
	next(function(response){
		if(response.status == 401 ) {
			if(this.$route.name != 'index'){
				window.location = "/"
				//this.$router.push('index');
			}
		}
		else if(response.status == 403 ) {
			alert(response.statusText);
			window.location = 'errors/forbidden';
		}
	});
});
Vue.mixin({
	data: function() {
		return {
			get ActiveUser() {
				return ActiveUser
			}
		}
	},
	methods: {
		SetPageTitle: function(title, pagename){
			document.title = title;
		},
		setPhotoUrl: function(src, width,height){
			var newSrc = 'helpers/timthumb.php?src=' + src;
			if(width){
				newSrc = newSrc + '&w=' + width
			}
			if(height){
				newSrc = newSrc + '&h=' + height	
			}
			return  newSrc;
		},
		exportPage: function(pagehtml , reporttitle){
			var form = document.getElementById("exportform");
			document.getElementById("exportformdata").value = pagehtml ;
			document.getElementById("exportformtitle").value = reporttitle ;
			form.submit();
		}
	}
});

var app = new Vue({
	el: '#app',
	router: router,
	data:{
		showPageError : false,
		pageErrorMsg : '',
		pageErrorStatus : '',
		modalComponentName: '',
		modalComponentProps: '',
		popoverTarget : '',
		showModalView : false,
		showFlash : false,
		flashMsg : '',
	},
	watch : {
		'$route': function(){
			this.pageErrorMsg = '' ;
			this.showPageError = false ;
		},
	},
	mounted : function(){
		this.$on('requestCompleted' ,  function (msg) {
			this.showModal = false;
			if(msg){
				this.showFlash = 3 ;
				this.flashMsg = msg ;
			}
			bus.$emit('refresh');
		});
		this.$on('requestError' ,  function (response) {
			this.pageErrorMsg = response.bodyText ;
			this.pageErrorStatus = response.statusText ;
			this.showPageError = true ;
		})
		
		this.$on('showPageModal' ,  function (props) {
			if(props.page){
				this.modalComponentName = props.page;
				delete props.page;
				props.resetgrid = true; // reset columns so that page components will fit well
				this.modalComponentProps = props;
				this.showModalView = true;
			}
			else{
				console.error("No Page Defined")
			}
		})
		
		this.$on('showPopOver' ,  function (props) {
			if(props.page && props.target){
				this.modalComponentName = props.page;
				this.popoverTarget = props.target;
				delete props.page;
				delete props.target;
				props.resetgrid=true;
				this.modalComponentProps = props;
			}
			else{
				console.error("No Page or Target  Defined")
			}
		})
		
		this.$on('showListModal' ,  function (arr) {
			this.modalComponentName = arr[0];
			this.modalFieldName = arr[1];
			this.modalFieldValue = arr[2];
			this.showModalList = true;
		})
	}
});


Vue.filter('toUSD', function (value) {
	return '$'+ value;
});
Vue.filter('upper', function (value) {
	return value.toUpperCase();
});
Vue.filter('lower', function (value) {
	return value.toLowerCase();
});
Vue.filter('proper', function (value) {
	return value.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
});
Vue.filter('truncate', function (text, length, suffix) {
	return text.substring(0, length) + suffix;
});
Vue.filter('toFixed', function (price, limit) {
	return price.toFixed(limit);
});
Vue.filter('makeRead', function (str) {
	return str.replace(/[-_]/g, " ");
});
Vue.filter('humanDate', function (datestr) {
	var timeStamp = new Date(datestr);
	return timeStamp.toDateString();
});
Vue.filter('humanTime', function (datestr) {
	var timeStamp = new Date(datestr);
	return timeStamp.toLocaleTimeString();
});

Vue.filter('toLocaleString', function (val) {
	return val.toLocaleString();
});
