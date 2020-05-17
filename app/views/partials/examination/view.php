    <template id="examinationView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Examination</h3>
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
                                                    <th class="title"> Name :</th>
                                                    <td class="value"> {{ data.name }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Description :</th>
                                                    <td class="value"> {{ data.description }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Date :</th>
                                                    <td class="value"> {{ data.date }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Time :</th>
                                                    <td class="value"><router-link :to="'/examination/view/' +  data.id">{{data.time}}</router-link></td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/examination/edit/'  + data.id">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/examination/delete/' + data.id">
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
	var ExaminationViewComponent = Vue.component('examinationView', {
		template : '#examinationView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'examination',
			},
			routename : {
				type : String,
				default : 'examinationview',
			},
			apipath: {
				type : String,
				default : 'examination/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id: '',name: '',description: '',date: '',time: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Examination';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id: '',name: '',description: '',date: '',time: '',
				}
			},
		},
	});
	</script>
