    <template id="teacherAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Teacher</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="teacher/add" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('name')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="name">Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.name"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Name"
                                                    class="form-control "
                                                    type="text"
                                                    name="name"
                                                    placeholder="Enter Name"
                                                    />
                                                    <small v-show="errors.has('name')" class="form-text text-danger">
                                                        {{ errors.first('name') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('designation')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="designation">Designation <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <textarea
                                                        v-model="data.designation"
                                                        v-validate="{required:true}"
                                                        data-vv-as="Designation"
                                                        placeholder="Enter Designation" 
                                                        rows="5" 
                                                        name="designation" 
                                                    class=" form-control"></textarea>
                                                    <small v-show="errors.has('designation')" class="form-text text-danger">{{ errors.first('designation') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('slary')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="slary">Slary <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.slary"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Slary"
                                                    class="form-control "
                                                    type="number"
                                                    name="slary"
                                                    placeholder="Enter Slary"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('slary')" class="form-text text-danger">
                                                        {{ errors.first('slary') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('doj')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="doj">Doj <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <flat-pickr
                                                    v-model="data.doj"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Doj"
                                                    name="doj"
                                                    placeholder="Enter Doj"
                                                    :config="{
                                                    dateFormat: 'Y-m-d',
                                                    altFormat: 'F j, Y',
                                                    altInput: true, 
                                                    allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small v-show="errors.has('doj')" class="form-text text-danger">{{ errors.first('doj') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
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
	var TeacherAddComponent = Vue.component('teacherAdd', {
		template : '#teacherAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'teacher',
			},
			routename : {
				type : String,
				default : 'teacheradd',
			},
			apipath : {
				type : String,
				default : 'teacher/add',
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
					name: '',designation: '',slary: '',doj: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Teacher';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/teacher');
			},
			resetForm : function(){
				this.data = {name: '',designation: '',slary: '',doj: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
