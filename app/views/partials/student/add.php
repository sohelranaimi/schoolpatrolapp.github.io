    <template id="studentAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Student</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="student/add" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('NAME')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="NAME">Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.NAME"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Name"
                                                    class="form-control "
                                                    type="text"
                                                    name="NAME"
                                                    placeholder="Enter Name"
                                                    />
                                                    <small v-show="errors.has('NAME')" class="form-text text-danger">
                                                        {{ errors.first('NAME') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('TITLE')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="TITLE">Title <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.TITLE"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Title"
                                                    class="form-control "
                                                    type="text"
                                                    name="TITLE"
                                                    placeholder="Enter Title"
                                                    />
                                                    <small v-show="errors.has('TITLE')" class="form-text text-danger">
                                                        {{ errors.first('TITLE') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('CLASS')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="CLASS">Class <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.CLASS"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Class"
                                                    class="form-control "
                                                    type="text"
                                                    name="CLASS"
                                                    placeholder="Enter Class"
                                                    />
                                                    <small v-show="errors.has('CLASS')" class="form-text text-danger">
                                                        {{ errors.first('CLASS') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('SECTION')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="SECTION">Section <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.SECTION"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Section"
                                                    class="form-control "
                                                    type="text"
                                                    name="SECTION"
                                                    placeholder="Enter Section"
                                                    />
                                                    <small v-show="errors.has('SECTION')" class="form-text text-danger">
                                                        {{ errors.first('SECTION') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('ROLLID')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ROLLID">Rollid <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.ROLLID"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Rollid"
                                                    class="form-control "
                                                    type="number"
                                                    name="ROLLID"
                                                    placeholder="Enter Rollid"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('ROLLID')" class="form-text text-danger">
                                                        {{ errors.first('ROLLID') }}
                                                    </small>
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
	var StudentAddComponent = Vue.component('studentAdd', {
		template : '#studentAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'student',
			},
			routename : {
				type : String,
				default : 'studentadd',
			},
			apipath : {
				type : String,
				default : 'student/add',
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
					NAME: '',TITLE: '',CLASS: '',SECTION: '',ROLLID: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Student';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/student');
			},
			resetForm : function(){
				this.data = {NAME: '',TITLE: '',CLASS: '',SECTION: '',ROLLID: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
