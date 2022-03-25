<div class="newsletter-sender-list">
	<div class="sw-container">
		<div class="sw-page">
			<div class="sw-page__head-area">
				<div class="smart-bar__content">
				  	<div class="smart-bar__header">
				  		<h2>Sender
				  			<span class="sw-page__smart-bar-amount">@php echo "(".count($newsletterSender).")"; @endphp</span>
				  		</h2>
				  	</div>
				  	<div class="smart-bar__actions custom-actions">
				  		<div class="sw-tooltip--wrapper">
				  			<a href="#" class="sw-button sw-button--primary newsletter-btn-create-sender">
					  			<span class="sw-button__content">
					            	Create new sender
					        	</span>
					        </a>
					    </div>
					</div>
				</div>
			</div>
			<div class="sw-page__content">
				<div class="sw-page__main-content custom-lisitng-box">
					<div class="sw-page__main-content-inner">
						<div class="sw-product-list__content">
							<div class="sw-data-grid">
								<div class="sw-data-grid__wrapper">
									<div class='sw-data-grid__bulk deletesender-bulk'>
										<span class='sw-data-grid__bulk-selected sw-data-grid__bulk-selected-label'>Selected:</span>
										<span class='sw-data-grid__bulk-selected sw-data-grid__bulk-selected-count delete-sender-count'></span> 
										<span class='sw-data-grid__bulk-selected bulk-link'>
											<a class='link link-danger delete-selectednewslettersender'>Delete</a>
										</span>
									</div>
									<table class="sw-data-grid__table" id="myTable">
										<thead class="sw-data-grid__header">
											<tr class="sw-data-grid__row">
												<th class="sw-data-grid__cell sw-data-grid__cell--selection">
													<div class="sw-data-grid__cell-content">
														<div class="sw-field--checkbox sw-data-grid__select-all">
															<div class="sw-field--checkbox__content">
																<div class="sw-field__checkbox">
																	<input id="deleteAllSender"type="checkbox" name="deleteAllSender[]" class="deleteAllSender">
																	<div class="sw-field__checkbox-state"><span class="sw-icon icon--small-default-checkmark-line-small sw-icon--fill" style="width: 16px; height: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16"><defs><path id="icons-small-default-checkmark-line-small-a" d="M5.70710678,7.29289322 C5.31658249,6.90236893 4.68341751,6.90236893 4.29289322,7.29289322 C3.90236893,7.68341751 3.90236893,8.31658249 4.29289322,8.70710678 L6.29289322,10.7071068 C6.68341751,11.0976311 7.31658249,11.0976311 7.70710678,10.7071068 L11.7071068,6.70710678 C12.0976311,6.31658249 12.0976311,5.68341751 11.7071068,5.29289322 C11.3165825,4.90236893 10.6834175,4.90236893 10.2928932,5.29289322 L7,8.58578644 L5.70710678,7.29289322 Z"></path></defs><use fill="#758CA3" fill-rule="evenodd" xlink:href="#icons-small-default-checkmark-line-small-a"></use></svg></span></div>
																	</div> 
																	<div class="sw-field"></div>
															</div> 
														</div>
													</div>
												</th> 
												<th class="sw-data-grid__cell">
													<div class="sw-data-grid__cell-content">
														Email Address
                           							</div> 
                           						</th>
                           						<th class="sw-data-grid__cell">
                           							<div class="sw-data-grid__cell-content">
                                						Sender's name
                              						</div>
                              					</th>
                              					
                    							
                    							<th class="sw-data-grid__cell sw-data-grid__cell--header sw-data-grid__cell--actions">
                    								<div class="sw-data-grid__cell-content">
                    									<div class="sw-context-button" tooltip-id="ee6b0b70ec7049a3aef41efeb2cba711">
                    										<button aria-label="List settings" class="sw-button sw-data-grid-settings__trigger sw-button--x-small sw-button--square">
                    											<span class="sw-button__content">
                    												<span class="sw-icon icon--small-default-stack-line sw-icon--fill" style="width: 14px; height: 14px;">
                    													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                    														<path fill="#758CA3" fill-rule="evenodd" d="M2,4 C1.44771525,4 1,3.55228475 1,3 C1,2.44771525 1.44771525,2 2,2 L14,2 C14.5522847,2 15,2.44771525 15,3 C15,3.55228475 14.5522847,4 14,4 L2,4 Z M2,9 C1.44771525,9 1,8.55228475 1,8 C1,7.44771525 1.44771525,7 2,7 L14,7 C14.5522847,7 15,7.44771525 15,8 C15,8.55228475 14.5522847,9 14,9 L2,9 Z M2,14 C1.44771525,14 1,13.5522847 1,13 C1,12.4477153 1.44771525,12 2,12 L14,12 C14.5522847,12 15,12.4477153 15,13 C15,13.5522847 14.5522847,14 14,14 L2,14 Z"></path>
                    													</svg>
                    												</span>
                    											</span>
                    										</button> 
                    									</div> 
                    								</div>
                    							</th>
                    						</tr>
                    					</thead> 
                    					<tbody class="sw-data-grid__body" id="sender-tbody">
                    						 <?php //dd($newsletterSender); ?>
                    						@foreach ($newsletterSender as $value)
                    						
                    						<tr class="sw-data-grid__row sw-data-grid__row--0 sender-{{ $value->id }}" id="{{ $value->id }}">
                    							<td class="sw-data-grid__cell sw-data-grid__cell--selection">
                    								<div class="sw-data-grid__cell-content">
                    									<div class="sw-field--checkbox">
                    										<div class="sw-field--checkbox__content">
                    											<div class="sw-field__checkbox">
                    												<input id="deleteSelectedSender" type="checkbox" name="deleteSelectedSender[]" value="{{ $value->id }}" data-id="{{ $value->id }}" class="deleteSelectedSender"> 
                    												<div class="sw-field__checkbox-state">
                    													<span class="sw-icon icon--small-default-checkmark-line-small sw-icon--fill" style="width: 16px; height: 16px;">
                    														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16"><defs><path id="icons-small-default-checkmark-line-small-a" d="M5.70710678,7.29289322 C5.31658249,6.90236893 4.68341751,6.90236893 4.29289322,7.29289322 C3.90236893,7.68341751 3.90236893,8.31658249 4.29289322,8.70710678 L6.29289322,10.7071068 C6.68341751,11.0976311 7.31658249,11.0976311 7.70710678,10.7071068 L11.7071068,6.70710678 C12.0976311,6.31658249 12.0976311,5.68341751 11.7071068,5.29289322 C11.3165825,4.90236893 10.6834175,4.90236893 10.2928932,5.29289322 L7,8.58578644 L5.70710678,7.29289322 Z"></path></defs><use fill="#758CA3" fill-rule="evenodd" xlink:href="#icons-small-default-checkmark-line-small-a"></use>
                    														</svg>
                    													</span>
                    												</div>
                    											</div> 
                    										</div>
                    									</div>
                    								</td> 
                    								<td class="sw-data-grid__cell">
                    									<div class="sw-data-grid__cell-content"> 
                    										<div>
                    											<a href='#/sw/product/detail/c95cce60de474cbea135422fd4094985' class=''>
                        											{{ $value->email }} 
                    											</a>
                    										</div>
                    									</div>
                    								</td>
                    								<td class="sw-data-grid__cell">
                    									<div class="sw-data-grid__cell-content"> 
                    										<span class="sw-data-grid__cell-value">
                                        						{{ $value->name }}
                                    						</span>
                                    					</div>
                                    				</td>
                                    				
           									<td class="sw-data-grid__cell sw-data-grid__cell--actions custom-options" data-id="{{ $value->id }}" id="{{ $value->name }}">
           										<div class="sw-data-grid__cell-content">
           											<div class="sw-context-button sw-data-grid__actions-menu">
           												<button class="sw-context-button__button">
           													<span aria-hidden="true" class="sw-icon icon--small-more sw-icon--fill sw-icon--small">
           														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
           															<path fill="#758CA3" fill-rule="evenodd" d="M3.5,9.5 C2.67157288,9.5 2,8.82842712 2,8 C2,7.17157288 2.67157288,6.5 3.5,6.5 C4.32842712,6.5 5,7.17157288 5,8 C5,8.82842712 4.32842712,9.5 3.5,9.5 Z M8,9.5 C7.17157288,9.5 6.5,8.82842712 6.5,8 C6.5,7.17157288 7.17157288,6.5 8,6.5 C8.82842712,6.5 9.5,7.17157288 9.5,8 C9.5,8.82842712 8.82842712,9.5 8,9.5 Z M12.5,9.5 C11.6715729,9.5 11,8.82842712 11,8 C11,7.17157288 11.6715729,6.5 12.5,6.5 C13.3284271,6.5 14,7.17157288 14,8 C14,8.82842712 13.3284271,9.5 12.5,9.5 Z"></path>
           														</svg>
           													</span>
           												</button> 
           												<!----></div>
           											<!----></div>
           									</td>
           								</tr>
           								@endforeach
           								</tbody>
           							</table>
           						



           							 





           						</div> 
           					</div> 
           				</div>
       				</div> 
   				</div>
			</div>
			 

			 <div class="popup custom-delete-model sender-delete-popup">
			 	<div class="sw-modal__dialog">
				    <div class="popup-content">
				     <header class="sw-modal__header">
				     	<h4 id="modalTitleEl" class="sw-modal__title">Warning</h4> 
				     	<button title="Close" aria-label="Close" class="sw-modal__close closeBtn">
				     		<span class="sw-icon icon--small-default-x-line-medium sw-icon--fill sw-icon--small">
				     			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="#758CA3" fill-rule="evenodd" d="M8,6.58578644 L11.2928932,3.29289322 C11.6834175,2.90236893 12.3165825,2.90236893 12.7071068,3.29289322 C13.0976311,3.68341751 13.0976311,4.31658249 12.7071068,4.70710678 L9.41421356,8 L12.7071068,11.2928932 C13.0976311,11.6834175 13.0976311,12.3165825 12.7071068,12.7071068 C12.3165825,13.0976311 11.6834175,13.0976311 11.2928932,12.7071068 L8,9.41421356 L4.70710678,12.7071068 C4.31658249,13.0976311 3.68341751,13.0976311 3.29289322,12.7071068 C2.90236893,12.3165825 2.90236893,11.6834175 3.29289322,11.2928932 L6.58578644,8 L3.29289322,4.70710678 C2.90236893,4.31658249 2.90236893,3.68341751 3.29289322,3.29289322 C3.68341751,2.90236893 4.31658249,2.90236893 4.70710678,3.29289322 L8,6.58578644 Z"></path>
				     			</svg>
				     		</span>
				     	</button>
				     </header>

				     <div class="sw-modal__body">
				     	<p class="sw-data-grid__confirm-bulk-delete-text">
            			Are you sure you want to delete this item?
        				</p>
        			</div>
				      <footer class="sw-modal__footer">
					      	<button class="sw-button sw-button--small sender-delete-popup-cancel">
					      		<span class="sw-button__content">
	                				Cancel
	            				</span>
	            			</button> 
	            			<button class="sw-button sw-button--danger sw-button--small sender-delete-popup-delete">
	            				<span class="sw-button__content">
	                				Delete
	            				</span>
	            			</button>
            			</footer>
				    </div>
				</div>
			  </div>


   		</div>
	</div>
</div>
