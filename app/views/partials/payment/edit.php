    <template id="paymentEdit">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Edit  Payment</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form  v-show="!loading" enctype="multipart/form-data" @submit="update()" class="form form-default" :action="'payment/edit/' + data.id" method="post">
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
                                                    v-validate="{required:true}"
                                                    data-vv-as="Roll"
                                                    class="form-control "
                                                    type="text"
                                                    name="roll"
                                                    placeholder="Enter Roll"
                                                    />
                                                    <small v-show="errors.has('roll')" class="form-text text-danger">
                                                        {{ errors.first('roll') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('desription')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="desription">Desription <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <textarea
                                                        v-model="data.desription"
                                                        v-validate="{required:true}"
                                                        data-vv-as="Desription"
                                                        placeholder="Enter Desription" 
                                                        rows="5" 
                                                        name="desription" 
                                                    class=" form-control"></textarea>
                                                    <small v-show="errors.has('desription')" class="form-text text-danger">{{ errors.first('desription') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('payable')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="payable">Payable <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.payable"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Payable"
                                                    class="form-control "
                                                    type="number"
                                                    name="payable"
                                                    placeholder="Enter Payable"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('payable')" class="form-text text-danger">
                                                        {{ errors.first('payable') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('paied')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="paied">Paied <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.paied"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Paied"
                                                    class="form-control "
                                                    type="number"
                                                    name="paied"
                                                    placeholder="Enter Paied"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('paied')" class="form-text text-danger">
                                                        {{ errors.first('paied') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('balace')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="balace">Balace <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.balace"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Balace"
                                                    class="form-control "
                                                    type="number"
                                                    name="balace"
                                                    placeholder="Enter Balace"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('balace')" class="form-text text-danger">
                                                        {{ errors.first('balace') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
	var PaymentEditComponent = Vue.component('paymentEdit', {
		template : '#paymentEdit',
		mixins: [EditPageMixin],
		props: {
			pagename : {
				type : String,
				default : 'payment',
			},
			routename : {
				type : String,
				default : 'paymentedit',
			},
			apipath : {
				type : String,
				default : 'payment/edit',
			},
		},
		data: function() {
			return {
				data : { name: '',class: '',roll: '',desription: '',payable: '',paied: '',balace: '',date: '',status: '', },
			}
		},
		computed: {
			pageTitle: function(){
				return 'Edit  Payment';
			},
		},
		methods: {
			actionAfterUpdate : function(response){
				this.$root.$emit('requestCompleted' , this.msgafterupdate);
				if(!this.ismodal){
					this.$router.push('/payment');
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
