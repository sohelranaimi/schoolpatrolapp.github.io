    <template id="despatchView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Despatch</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-12 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <div v-show="!loading">
                                    <div ref="datatable" id="datatable">
                                        <table class="table table-hover table-borderless table-striped">
                                            <!-- Table Body Start -->
                                            <tbody>
                                                <tr>
                                                    <th class="title"> Des Num :</th>
                                                    <td class="value"> {{ data.DES_NUM }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Des Date :</th>
                                                    <td class="value"> {{ data.DES_DATE }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Des Amount :</th>
                                                    <td class="value"> {{ data.DES_AMOUNT }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Ord Num :</th>
                                                    <td class="value"> {{ data.ORD_NUM }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Ord Date :</th>
                                                    <td class="value"> {{ data.ORD_DATE }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Ord Amount :</th>
                                                    <td class="value"> {{ data.ORD_AMOUNT }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Agent Code :</th>
                                                    <td class="value"> {{ data.AGENT_CODE }} </td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/despatch/edit/'  + data.DES_NUM">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/despatch/delete/' + data.DES_NUM">
                                            <i class="fa fa-times"></i> </button>
                                        </span>
                                        <button @click="exportRecord" class="btn btn-sm btn-primary" v-if="exportbutton">
                                            <i class="fa fa-save"></i> 
                                        </button>
                                    </div>
                                </div>
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
	var DespatchViewComponent = Vue.component('despatchView', {
		template : '#despatchView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'despatch',
			},
			routename : {
				type : String,
				default : 'despatchview',
			},
			apipath: {
				type : String,
				default : 'despatch/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						DES_NUM: '',DES_DATE: '',DES_AMOUNT: '',ORD_NUM: '',ORD_DATE: '',ORD_AMOUNT: '',AGENT_CODE: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Despatch';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					DES_NUM: '',DES_DATE: '',DES_AMOUNT: '',ORD_NUM: '',ORD_DATE: '',ORD_AMOUNT: '',AGENT_CODE: '',
				}
			},
		},
	});
	</script>
