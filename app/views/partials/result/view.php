    <template id="resultView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Result</h3>
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
                                                    <th class="title"> Exam Name :</th>
                                                    <td class="value"> {{ data.exam_name }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Exam Date :</th>
                                                    <td class="value"> {{ data.exam_date }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Result Pub Date :</th>
                                                    <td class="value"> {{ data.result_pub_date }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Student Name :</th>
                                                    <td class="value"> {{ data.student_name }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Student Class :</th>
                                                    <td class="value"> {{ data.student_class }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Student Roll :</th>
                                                    <td class="value"> {{ data.Student_roll }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Bangla :</th>
                                                    <td class="value"> {{ data.bangla }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> English :</th>
                                                    <td class="value"> {{ data.english }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Mathametics :</th>
                                                    <td class="value"> {{ data.mathametics }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Social Science :</th>
                                                    <td class="value"> {{ data.social_science }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> General Science :</th>
                                                    <td class="value"> {{ data.general_science }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Physics :</th>
                                                    <td class="value"> {{ data.physics }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Camistry :</th>
                                                    <td class="value"> {{ data.camistry }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Boilogy :</th>
                                                    <td class="value"> {{ data.boilogy }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Ict :</th>
                                                    <td class="value"> {{ data.ict }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Agricultur :</th>
                                                    <td class="value"> {{ data.agricultur }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Economics :</th>
                                                    <td class="value"> {{ data.economics }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Geography :</th>
                                                    <td class="value"> {{ data.geography }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> History :</th>
                                                    <td class="value"> {{ data.history }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Riligion :</th>
                                                    <td class="value"> {{ data.riligion }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Gpa :</th>
                                                    <td class="value"> {{ data.gpa }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Gread :</th>
                                                    <td class="value"> {{ data.gread }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Status :</th>
                                                    <td class="value"> {{ data.status }} </td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/result/edit/'  + data.id">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/result/delete/' + data.id">
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
	var ResultViewComponent = Vue.component('resultView', {
		template : '#resultView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'result',
			},
			routename : {
				type : String,
				default : 'resultview',
			},
			apipath: {
				type : String,
				default : 'result/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id: '',exam_name: '',exam_date: '',result_pub_date: '',student_name: '',student_class: '',Student_roll: '',bangla: '',english: '',mathametics: '',social_science: '',general_science: '',physics: '',camistry: '',boilogy: '',ict: '',agricultur: '',economics: '',geography: '',history: '',riligion: '',gpa: '',gread: '',status: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Result';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id: '',exam_name: '',exam_date: '',result_pub_date: '',student_name: '',student_class: '',Student_roll: '',bangla: '',english: '',mathametics: '',social_science: '',general_science: '',physics: '',camistry: '',boilogy: '',ict: '',agricultur: '',economics: '',geography: '',history: '',riligion: '',gpa: '',gread: '',status: '',
				}
			},
		},
	});
	</script>
