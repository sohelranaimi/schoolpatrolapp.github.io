    <template id="galaryAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Galary</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="galary/add" method="post">
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
                                                    enableTime: true, 
                                                    dateFormat: 'Y-m-d H:i:S',
                                                    altFormat: 'F j, Y - H:i',
                                                    altInput: true, allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small  v-show="errors.has('date')" class="form-text text-danger">{{ errors.first('date') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('photo')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="photo">Photo <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <niceupload
                                                        fieldname="photo"
                                                        control-class="upload-control"
                                                        dropmsg="Drop files here to upload"
                                                        uploadpath="uploads/files/"
                                                        filenameformat="random" 
                                                        extensions="jpg , png , gif , jpeg"  
                                                        :filesize="3" 
                                                        :maximum="1" 
                                                        name="photo"
                                                        v-model="data.photo"
                                                        v-validate="{required:true}"
                                                        data-vv-as="Photo"
                                                        >
                                                    </niceupload>
                                                    <small v-show="errors.has('photo')" class="form-text text-danger">{{ errors.first('photo') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('vidio')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="vidio">Video <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.vidio"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Video"
                                                    class="form-control "
                                                    type="text"
                                                    name="vidio"
                                                    placeholder="Enter Video"
                                                    />
                                                    <small v-show="errors.has('vidio')" class="form-text text-danger">
                                                        {{ errors.first('vidio') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('text')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="text">Text <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.text"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Text"
                                                    class="form-control "
                                                    type="text"
                                                    name="text"
                                                    placeholder="Enter Text"
                                                    />
                                                    <small v-show="errors.has('text')" class="form-text text-danger">
                                                        {{ errors.first('text') }}
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
	var GalaryAddComponent = Vue.component('galaryAdd', {
		template : '#galaryAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'galary',
			},
			routename : {
				type : String,
				default : 'galaryadd',
			},
			apipath : {
				type : String,
				default : 'galary/add',
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
					date: '',photo: '',vidio: '',text: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Galary';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/galary');
			},
			resetForm : function(){
				this.data = {date: '',photo: '',vidio: '',text: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
