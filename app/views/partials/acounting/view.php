    <template id="acountingView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Acounting</h3>
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
                                                    <th class="title"> Id :</th>
                                                    <td class="value"> {{ data.id }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Total Blance :</th>
                                                    <td class="value"> {{ data.total_blance }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Total Cost :</th>
                                                    <td class="value"> {{ data.total_cost }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Growth Blance :</th>
                                                    <td class="value"> {{ data.growth_blance }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Now Blance :</th>
                                                    <td class="value"> {{ data.now_blance }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Status :</th>
                                                    <td class="value"><router-link :to="'/acounting/view/' +  data.id">{{data.status}}</router-link></td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/acounting/edit/'  + data.id">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/acounting/delete/' + data.id">
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
	var AcountingViewComponent = Vue.component('acountingView', {
		template : '#acountingView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'acounting',
			},
			routename : {
				type : String,
				default : 'acountingview',
			},
			apipath: {
				type : String,
				default : 'acounting/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id: '',total_blance: '',total_cost: '',growth_blance: '',now_blance: '',status: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Acounting';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id: '',total_blance: '',total_cost: '',growth_blance: '',now_blance: '',status: '',
				}
			},
		},
	});
	</script>
