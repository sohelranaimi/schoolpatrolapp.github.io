    <template id="new_studentEdit">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Edit  New Student</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form  v-show="!loading" enctype="multipart/form-data" @submit="update()" class="form form-default" :action="'new_student/edit/' + data.id" method="post">
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
                                    <div class="form-group " :class="{'has-error' : errors.has('father_name')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="father_name">Father Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.father_name"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Father Name"
                                                    class="form-control "
                                                    type="text"
                                                    name="father_name"
                                                    placeholder="Enter Father Name"
                                                    />
                                                    <small v-show="errors.has('father_name')" class="form-text text-danger">
                                                        {{ errors.first('father_name') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('mother_name')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="mother_name">Mother Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.mother_name"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Mother Name"
                                                    class="form-control "
                                                    type="text"
                                                    name="mother_name"
                                                    placeholder="Enter Mother Name"
                                                    />
                                                    <small v-show="errors.has('mother_name')" class="form-text text-danger">
                                                        {{ errors.first('mother_name') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('old_school')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="old_school">Old School <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.old_school"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Old School"
                                                    class="form-control "
                                                    type="text"
                                                    name="old_school"
                                                    placeholder="Enter Old School"
                                                    />
                                                    <small v-show="errors.has('old_school')" class="form-text text-danger">
                                                        {{ errors.first('old_school') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('adm_class')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="adm_class">Adm Class <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.adm_class"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Adm Class"
                                                    class="form-control "
                                                    type="text"
                                                    name="adm_class"
                                                    placeholder="Enter Adm Class"
                                                    />
                                                    <small v-show="errors.has('adm_class')" class="form-text text-danger">
                                                        {{ errors.first('adm_class') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('past_result')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="past_result">Past Result <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.past_result"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Past Result"
                                                    class="form-control "
                                                    type="number"
                                                    name="past_result"
                                                    placeholder="Enter Past Result"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('past_result')" class="form-text text-danger">
                                                        {{ errors.first('past_result') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('address')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="address">Address <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <textarea
                                                        v-model="data.address"
                                                        v-validate="{required:true}"
                                                        data-vv-as="Address"
                                                        placeholder="Enter Address" 
                                                        rows="5" 
                                                        name="address" 
                                                    class=" form-control"></textarea>
                                                    <small v-show="errors.has('address')" class="form-text text-danger">{{ errors.first('address') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('phone')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="phone">Phone <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.phone"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Phone"
                                                    class="form-control "
                                                    type="number"
                                                    name="phone"
                                                    placeholder="Enter Phone"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('phone')" class="form-text text-danger">
                                                        {{ errors.first('phone') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button @click="update()" :disabled="errors.any()" class="btn btn-primary" type="button">
                                            <i class="load-indicator"><clip-loader :loading="saving" color="#fff" size="14px"></clip-loader> </i>
                                            {{submitbuttontext}}
                                            <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                                </form>
                                <div v-show="loading" class="load-indicator static-center">
                                    <span class="animator">
                                        <clip-loader :loading="loading" color="gray" size="20px">
                                        </clip-loader>
                                    </span>
                                    <h4 style="color:gray" class="loading-text"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var New_StudentEditComponent = Vue.component('new_studentEdit', {
		template : '#new_studentEdit',
		mixins: [EditPageMixin],
		props: {
			pagename : {
				type : String,
				default : 'new_student',
			},
			routename : {
				type : String,
				default : 'new_studentedit',
			},
			apipath : {
				type : String,
				default : 'new_student/edit',
			},
		},
		data: function() {
			return {
				data : { name: '',father_name: '',mother_name: '',old_school: '',adm_class: '',past_result: '',address: '',phone: '', },
			}
		},
		computed: {
			pageTitle: function(){
				return 'Edit  New Student';
			},
		},
		methods: {
			actionAfterUpdate : function(response){
				this.$root.$emit('requestCompleted' , this.msgafterupdate);
				if(!this.ismodal){
					this.$router.push('/new_student');
				}
			},
		},
		watch: {
			id: function(newVal, oldVal) {
				if(this.id){
					this.load();
				}
			},
			modelBind: function(){
				var binds = this.modelBind;
				for(key in binds){
					this.data[key]= binds[key];
				}
			},
			pageTitle: function(){
				this.SetPageTitle( this.pageTitle );
			},
		},
		created: function(){
			this.SetPageTitle(this.pageTitle);
		},
		mounted: function() {
			//this.load();
		},
	});
	</script>
