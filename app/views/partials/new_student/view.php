    <template id="new_studentView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  New Student</h3>
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
                                                    <th class="title"> Father Name :</th>
                                                    <td class="value"> {{ data.father_name }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Mother Name :</th>
                                                    <td class="value"> {{ data.mother_name }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Old School :</th>
                                                    <td class="value"> {{ data.old_school }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Adm Class :</th>
                                                    <td class="value"> {{ data.adm_class }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Past Result :</th>
                                                    <td class="value"> {{ data.past_result }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Address :</th>
                                                    <td class="value"> {{ data.address }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Phone :</th>
                                                    <td class="value"><router-link :to="'/new_student/view/' +  data.id">{{data.phone}}</router-link></td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/new_student/edit/'  + data.id">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/new_student/delete/' + data.id">
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
	var New_StudentViewComponent = Vue.component('new_studentView', {
		template : '#new_studentView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'new_student',
			},
			routename : {
				type : String,
				default : 'new_studentview',
			},
			apipath: {
				type : String,
				default : 'new_student/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id: '',name: '',father_name: '',mother_name: '',old_school: '',adm_class: '',past_result: '',address: '',phone: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  New Student';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id: '',name: '',father_name: '',mother_name: '',old_school: '',adm_class: '',past_result: '',address: '',phone: '',
				}
			},
		},
	});
	</script>
