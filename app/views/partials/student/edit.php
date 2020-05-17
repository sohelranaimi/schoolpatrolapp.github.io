    <template id="studentEdit">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Edit  Student</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form  v-show="!loading" enctype="multipart/form-data" @submit="update()" class="form form-default" :action="'student/edit/' + data.id" method="post">
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
	var StudentEditComponent = Vue.component('studentEdit', {
		template : '#studentEdit',
		mixins: [EditPageMixin],
		props: {
			pagename : {
				type : String,
				default : 'student',
			},
			routename : {
				type : String,
				default : 'studentedit',
			},
			apipath : {
				type : String,
				default : 'student/edit',
			},
		},
		data: function() {
			return {
				data : { NAME: '',TITLE: '',CLASS: '',SECTION: '',ROLLID: '', },
			}
		},
		computed: {
			pageTitle: function(){
				return 'Edit  Student';
			},
		},
		methods: {
			actionAfterUpdate : function(response){
				this.$root.$emit('requestCompleted' , this.msgafterupdate);
				if(!this.ismodal){
					this.$router.push('/student');
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
