    <template id="despatchAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Despatch</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="despatch/add" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('DES_NUM')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="DES_NUM">Des Num <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.DES_NUM"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Des Num"
                                                    class="form-control "
                                                    type="text"
                                                    name="DES_NUM"
                                                    placeholder="Enter Des Num"
                                                    />
                                                    <small v-show="errors.has('DES_NUM')" class="form-text text-danger">
                                                        {{ errors.first('DES_NUM') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('DES_DATE')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="DES_DATE">Des Date <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <flat-pickr
                                                    v-model="data.DES_DATE"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Des Date"
                                                    name="DES_DATE"
                                                    placeholder="Enter Des Date"
                                                    :config="{
                                                    dateFormat: 'Y-m-d',
                                                    altFormat: 'F j, Y',
                                                    altInput: true, 
                                                    allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small v-show="errors.has('DES_DATE')" class="form-text text-danger">{{ errors.first('DES_DATE') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('DES_AMOUNT')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="DES_AMOUNT">Des Amount <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.DES_AMOUNT"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Des Amount"
                                                    class="form-control "
                                                    type="number"
                                                    name="DES_AMOUNT"
                                                    placeholder="Enter Des Amount"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('DES_AMOUNT')" class="form-text text-danger">
                                                        {{ errors.first('DES_AMOUNT') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('ORD_NUM')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ORD_NUM">Ord Num <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.ORD_NUM"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Ord Num"
                                                    class="form-control "
                                                    type="number"
                                                    name="ORD_NUM"
                                                    placeholder="Enter Ord Num"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('ORD_NUM')" class="form-text text-danger">
                                                        {{ errors.first('ORD_NUM') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('ORD_DATE')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ORD_DATE">Ord Date <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <flat-pickr
                                                    v-model="data.ORD_DATE"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Ord Date"
                                                    name="ORD_DATE"
                                                    placeholder="Enter Ord Date"
                                                    :config="{
                                                    dateFormat: 'Y-m-d',
                                                    altFormat: 'F j, Y',
                                                    altInput: true, 
                                                    allowInput:true
                                                    }"
                                                    >
                                                    </flat-pickr>
                                                    <small v-show="errors.has('ORD_DATE')" class="form-text text-danger">{{ errors.first('ORD_DATE') }}</small>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('ORD_AMOUNT')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ORD_AMOUNT">Ord Amount <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.ORD_AMOUNT"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Ord Amount"
                                                    class="form-control "
                                                    type="number"
                                                    name="ORD_AMOUNT"
                                                    placeholder="Enter Ord Amount"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('ORD_AMOUNT')" class="form-text text-danger">
                                                        {{ errors.first('ORD_AMOUNT') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('AGENT_CODE')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="AGENT_CODE">Agent Code <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.AGENT_CODE"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Agent Code"
                                                    class="form-control "
                                                    type="text"
                                                    name="AGENT_CODE"
                                                    placeholder="Enter Agent Code"
                                                    />
                                                    <small v-show="errors.has('AGENT_CODE')" class="form-text text-danger">
                                                        {{ errors.first('AGENT_CODE') }}
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
	var DespatchAddComponent = Vue.component('despatchAdd', {
		template : '#despatchAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'despatch',
			},
			routename : {
				type : String,
				default : 'despatchadd',
			},
			apipath : {
				type : String,
				default : 'despatch/add',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
					DES_NUM: '',DES_DATE: '',DES_AMOUNT: '',ORD_NUM: '',ORD_DATE: '',ORD_AMOUNT: '',AGENT_CODE: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Despatch';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/despatch');
			},
			resetForm : function(){
				this.data = {DES_NUM: '',DES_DATE: '',DES_AMOUNT: '',ORD_NUM: '',ORD_DATE: '',ORD_AMOUNT: '',AGENT_CODE: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
