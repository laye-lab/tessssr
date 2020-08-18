
                <table class="table ">

                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Mois</th>
                        <th>Nom agent</th>
                        <th>Matricule</th>
                        <th>Taux à 15%</th>
                        <th>Taux à 40%</th>
                        <th>Taux à 60%</th>
                        <th>Taux à 100%</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>

                      @foreach ($data as  $datas)



                                      </tr>
                                      <td>{{$datas->year}}</td>
                                      <td>{{$datas->month}}</td>
                                      <td>{{$datas->Nom}}</td>
                                      <td>{{$datas->agent}}</td>
                                      <td>{{$datas->sum15}}</td>
                                      <td>{{$datas->sum40}}</td>
                                      <td>{{$datas->sum60}}</td>
                                      <td>{{$datas->sum100}}</td>
                                      <td><button class=" btn btn-lg btn-danger">{{$datas->total}}</button></td>
                                      </tr>

                       @endforeach


                          </tr>
                  </table>

