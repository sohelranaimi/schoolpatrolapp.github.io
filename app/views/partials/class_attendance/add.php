    <template id="class_attendanceAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Class Attendance</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="class_attendance/add" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('date')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="date">Date <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <flat-pickr
                                                    v-model="data.date"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Date"
                                                    name="date"
                                                    placeholder="Enter Date"
                                                    :config="{
                                                    dateFormat: 'Y-m-d',
                                                    altFormat: 'F j, Y',
                                                    altInput: true, 
                                                    allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small v-show="errors.has('date')" class="form-text text-danger">{{ errors.first('date') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('name')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="name">Name </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.name"
                                                    v-validate="{}"
                                                    data-vv-as="Name"
                                                    class="form-control "
                                                    type="text"
                                                    name="name"
                                                    placeholder="Enter Name"
                                                    list="name_list" 
                                                    />
                                                    <small v-show="errors.has('name')" class="form-text text-danger">
                                                        {{ errors.first('name') }}
                                                    </small>
                                                    <datalist id="name_list">
                                                        <optionlist datapath="'components/class_attendance_name_option_list/'"></optionlist>
                                                    </datalist>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('class')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="class">Class <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.class"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Class"
                                                    class="form-control "
                                                    type="text"
                                                    name="class"
                                                    placeholder="Enter Class"
                                                    />
                                                    <small v-show="errors.has('class')" class="form-text text-danger">
                                                        {{ errors.first('class') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('roll')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="roll">Roll <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.roll"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Roll"
                                                    class="form-control "
                                                    type="number"
                                                    name="roll"
                                                    placeholder="Enter Roll"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('roll')" class="form-text text-danger">
                                                        {{ errors.first('roll') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('status')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="status">Status </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <nicetoggle
                                                        colorclass="bg-primary"
                                                        shape="round"
                                                        text-enabled=""
                                                        text-disabled=""
                                                        name="status"
                                                        v-model="data.status"
                                                        data-vv-value-path="data.status"
                                                        data-vv-as="Status"
                                                        v-validate="{}">
                                                    </nicetoggle>
                                                    <small v-show="errors.has('status')" class="form-text text-danger">{{ errors.first('status') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary"  :disabled="errors.any()" type="submit">
                                            <i class="load-indicator">
                                                <clip-loader :loading="saving" color="#fff" size="15px"></clip-loader>
                                            </i>
                                            {{submitbuttontext}}
                                            <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var Class_AttendanceAddComponent = Vue.component('class_attendanceAdd', {
		template : '#class_attendanceAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'class_attendance',
			},
			routename : {
				type : String,
				default : 'class_attendanceadd',
			},
			apipath : {
				type : String,
				default : 'class_attendance/add',
			},
			submitbuttontext: {
				type: String,
				default: 'Submit',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
					date: '',name: '',class: '',roll: '',status: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Class Attendance';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/class_attendance');
			},
			resetForm : function(){
				this.data = {date: '',name: '',class: '',roll: '',status: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
