@if ( defined('CHAT_API_KEY') AND !empty(CHAT_API_KEY) )
	<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="{{ CHAT_API_KEY }}";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
@else
	<!-- start scrollUp  -->
	<div id="scrollUp">
		<i class="fa fa-angle-up"></i>
	</div>
	<!-- End scrollUp  -->
@endif