
<div class="sw-card sw-product-detail-specification__measures-packaging">
	<div class="sw-card__title">
          
    </div>
    <div class="sw-card__content">
    	<div class="sw-container">
             <div class="sw-tabs sw-tabs--small tabs">
                <div class="sw-tabs__content" style="padding-bottom: 0px;" id="tabs-nav"> 
                    <ul class="child">
                        <li>
                            <a href="#tab3-1" class="sw-tabs-item main-sender" title="General">
                                Sender
                            </a>
                        </li>
                        <li> 
                            <a href="#tab3-2" class="sw-tabs-item" title="Products">
                               Recipient groups 
                            </a> 
                        </li>
                        <li> 
                            <a href="#tab3-3" class="sw-tabs-item" title="Products">
                               Recipients
                            </a> 
                        </li>
                    </ul>
                </div>
            </div>
             <div id="tabs-content">
                <div id="tab3-1" class="tab-content">
                     @include('newsletter.newslettersender.index')
                </div>
                <div id="tab3-2" class="tab-content">
                    @include('newsletter.recipientgroup.index')
                </div>
                 <div id="tab3-3" class="tab-content">
                     @include('newsletter.recipient.index')
                </div>
                

            </div>

	   </div>
    </div> 
</div>