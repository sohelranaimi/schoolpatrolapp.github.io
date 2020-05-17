    <template id="resultEdit">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Edit  Result</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form  v-show="!loading" enctype="multipart/form-data" @submit="update()" class="form form-default" :action="'result/edit/' + data.id" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('exam_name')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="exam_name">Exam Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.exam_name"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Exam Name"
                                                    class="form-control "
                                                    type="text"
                                                    name="exam_name"
                                                    placeholder="Enter Exam Name"
                                                    />
                                                    <small v-show="errors.has('exam_name')" class="form-text text-danger">
                                                        {{ errors.first('exam_name') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('exam_date')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="exam_date">Exam Date <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <flat-pickr
                                                    v-model="data.exam_date"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Exam Date"
                                                    name="exam_date"
                                                    placeholder="Enter Exam Date"
                                                    :config="{
                                                    enableTime: true, 
                                                    dateFormat: 'Y-m-d H:i:S',
                                                    altFormat: 'F j, Y - H:i',
                                                    altInput: true, allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small  v-show="errors.has('exam_date')" class="form-text text-danger">{{ errors.first('exam_date') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('result_pub_date')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="result_pub_date">Result Pub Date <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <flat-pickr
                                                    v-model="data.result_pub_date"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Result Pub Date"
                                                    name="result_pub_date"
                                                    placeholder="Enter Result Pub Date"
                                                    :config="{
                                                    enableTime: true, 
                                                    dateFormat: 'Y-m-d H:i:S',
                                                    altFormat: 'F j, Y - H:i',
                                                    altInput: true, allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small  v-show="errors.has('result_pub_date')" class="form-text text-danger">{{ errors.first('result_pub_date') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('student_name')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="student_name">Student Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.student_name"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Student Name"
                                                    class="form-control "
                                                    type="text"
                                                    name="student_name"
                                                    placeholder="Enter Student Name"
                                                    />
                                                    <small v-show="errors.has('student_name')" class="form-text text-danger">
                                                        {{ errors.first('student_name') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('student_class')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="student_class">Student Class <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.student_class"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Student Class"
                                                    class="form-control "
                                                    type="text"
                                                    name="student_class"
                                                    placeholder="Enter Student Class"
                                                    />
                                                    <small v-show="errors.has('student_class')" class="form-text text-danger">
                                                        {{ errors.first('student_class') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('Student_roll')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Student_roll">Student Roll <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.Student_roll"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Student Roll"
                                                    class="form-control "
                                                    type="number"
                                                    name="Student_roll"
                                                    placeholder="Enter Student Roll"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('Student_roll')" class="form-text text-danger">
                                                        {{ errors.first('Student_roll') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('bangla')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="bangla">Bangla <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.bangla"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Bangla"
                                                    class="form-control "
                                                    type="number"
                                                    name="bangla"
                                                    placeholder="Enter Bangla"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('bangla')" class="form-text text-danger">
                                                        {{ errors.first('bangla') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('english')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="english">English <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.english"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="English"
                                                    class="form-control "
                                                    type="number"
                                                    name="english"
                                                    placeholder="Enter English"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('english')" class="form-text text-danger">
                                                        {{ errors.first('english') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('mathametics')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="mathametics">Mathametics <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.mathametics"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Mathametics"
                                                    class="form-control "
                                                    type="number"
                                                    name="mathametics"
                                                    placeholder="Enter Mathametics"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('mathametics')" class="form-text text-danger">
                                                        {{ errors.first('mathametics') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('social_science')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="social_science">Social Science </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.social_science"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="Social Science"
                                                    class="form-control "
                                                    type="number"
                                                    name="social_science"
                                                    placeholder="Enter Social Science"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('social_science')" class="form-text text-danger">
                                                        {{ errors.first('social_science') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('general_science')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="general_science">General Science </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.general_science"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="General Science"
                                                    class="form-control "
                                                    type="number"
                                                    name="general_science"
                                                    placeholder="Enter General Science"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('general_science')" class="form-text text-danger">
                                                        {{ errors.first('general_science') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('physics')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="physics">Physics </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.physics"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="Physics"
                                                    class="form-control "
                                                    type="number"
                                                    name="physics"
                                                    placeholder="Enter Physics"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('physics')" class="form-text text-danger">
                                                        {{ errors.first('physics') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('camistry')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="camistry">Camistry </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.camistry"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="Camistry"
                                                    class="form-control "
                                                    type="number"
                                                    name="camistry"
                                                    placeholder="Enter Camistry"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('camistry')" class="form-text text-danger">
                                                        {{ errors.first('camistry') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('boilogy')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="boilogy">Boilogy </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.boilogy"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="Boilogy"
                                                    class="form-control "
                                                    type="number"
                                                    name="boilogy"
                                                    placeholder="Enter Boilogy"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('boilogy')" class="form-text text-danger">
                                                        {{ errors.first('boilogy') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('ict')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ict">Ict <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.ict"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Ict"
                                                    class="form-control "
                                                    type="number"
                                                    name="ict"
                                                    placeholder="Enter Ict"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('ict')" class="form-text text-danger">
                                                        {{ errors.first('ict') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('agricultur')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="agricultur">Agricultur </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.agricultur"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="Agricultur"
                                                    class="form-control "
                                                    type="number"
                                                    name="agricultur"
                                                    placeholder="Enter Agricultur"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('agricultur')" class="form-text text-danger">
                                                        {{ errors.first('agricultur') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('economics')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="economics">Economics </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.economics"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="Economics"
                                                    class="form-control "
                                                    type="number"
                                                    name="economics"
                                                    placeholder="Enter Economics"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('economics')" class="form-text text-danger">
                                                        {{ errors.first('economics') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('geography')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="geography">Geography </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.geography"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="Geography"
                                                    class="form-control "
                                                    type="number"
                                                    name="geography"
                                                    placeholder="Enter Geography"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('geography')" class="form-text text-danger">
                                                        {{ errors.first('geography') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('history')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="history">History </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.history"
                                                    v-validate="{numeric:true}"
                                                    data-vv-as="History"
                                                    class="form-control "
                                                    type="number"
                                                    name="history"
                                                    placeholder="Enter History"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('history')" class="form-text text-danger">
                                                        {{ errors.first('history') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('riligion')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="riligion">Riligion <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.riligion"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Riligion"
                                                    class="form-control "
                                                    type="number"
                                                    name="riligion"
                                                    placeholder="Enter Riligion"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('riligion')" class="form-text text-danger">
                                                        {{ errors.first('riligion') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('gpa')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="gpa">Gpa <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.gpa"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Gpa"
                                                    class="form-control "
                                                    type="number"
                                                    name="gpa"
                                                    placeholder="Enter Gpa"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('gpa')" class="form-text text-danger">
                                                        {{ errors.first('gpa') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('gread')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="gread">Gread <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.gread"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Gread"
                                                    class="form-control "
                                                    type="text"
                                                    name="gread"
                                                    placeholder="Enter Gread"
                                                    />
                                                    <small v-show="errors.has('gread')" class="form-text text-danger">
                                                        {{ errors.first('gread') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('status')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="status">Status <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.status"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Status"
                                                    class="form-control "
                                                    type="text"
                                                    name="status"
                                                    placeholder="Enter Status"
                                                    />
                                                    <small v-show="errors.has('status')" class="form-text text-danger">
                                                        {{ errors.first('status') }}
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
	var ResultEditComponent = Vue.component('resultEdit', {
		template : '#resultEdit',
		mixins: [EditPageMixin],
		props: {
			pagename : {
				type : String,
				default : 'result',
			},
			routename : {
				type : String,
				default : 'resultedit',
			},
			apipath : {
				type : String,
				default : 'result/edit',
			},
		},
		data: function() {
			return {
				data : { exam_name: '',exam_date: '',result_pub_date: '',student_name: '',student_class: '',Student_roll: '',bangla: '',english: '',mathametics: '',social_science: '',general_science: '',physics: '',camistry: '',boilogy: '',ict: '',agricultur: '',economics: '',geography: '',history: '',riligion: '',gpa: '',gread: '',status: '', },
			}
		},
		computed: {
			pageTitle: function(){
				return 'Edit  Result';
			},
		},
		methods: {
			actionAfterUpdate : function(response){
				this.$root.$emit('requestCompleted' , this.msgafterupdate);
				if(!this.ismodal){
					this.$router.push('/result');
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
