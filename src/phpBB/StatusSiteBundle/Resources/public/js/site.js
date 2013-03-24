$(document).ready(function() {

	var test = document.createElement('div');
	function testStyles(styles)
	{
		var result = '';
		for (var i=0; i<styles.length; i++)
		{
			if (typeof test.style[styles[i]] != 'undefined')
			{
				result = styles[i];
			}
		}
		return result;
	}

	/* Ancient browsers */
	(function() {
		if (testStyles(['borderRadius']) == '')
		{
			$('body').addClass('ancientBrowser');
		}
		if (testStyles(['msTransform', 'transform']) == 'msTransform')
		{
			$('body').addClass('ie9');
		}
	})();

	/* Opera Mini, bane of mobile web design */
	(function() {
		if (navigator && navigator.userAgent.indexOf('Opera Mini') > 0)
		{
			$('body').addClass('operaMini');
		}
	})();


	/* Footer */
	(function() {
		var minHeight = 440, /* default min-height for .container */
			headerHeight = 100, /* height for .navbar */
			extraDiff = 23, /*
							 * margin for .container + border for
							 * .footer
							 */
			footer = $('.footer'),
			content = $('.container');

		if (footer.length != 1 || !content.length)
		{
			return;
		}

		function checkFooter()
		{
			var windowHeight = $(window).height(),
				footerHeight = footer.height(),
				contentHeight = windowHeight - footerHeight - headerHeight - extraDiff;

			content.css('min-height', (contentHeight > minHeight ? Math.floor(contentHeight) : minHeight) + 'px');
		}

		$(window).resize(checkFooter);
		checkFooter();
	})();

	/* Navbar */
	(function() {
		function checkScroll()
		{
			var fixed = ($(window).width() > 600 && $(window).height() > 400 && $(document).scrollTop() > 35);
			$('.navbar').toggleClass('fixed', fixed);
			setTimeout(function() {
				$('.navbar ul').css('padding', fixed ? '0' : '');
			}, 50);
		}

		var body = $('body');
		if (body.hasClass('operaMini') || body.hasClass('ancientBrowser'))
		{
			return;
		}

		var navbar = $('.navbar');
		if (navbar.length)
		{
			if (testStyles(['MozTransform', 'webkitTransform', 'transform']) != '' && testStyles(['msTransform']) == '')
			{
				navbar.addClass('canScale');
			}
			$(document).scroll(checkScroll);
			$(window).resize(checkScroll);
			checkScroll();
		}
	})();

	/* Services */
	(function() {
		var services = $('#services');
		if (!services.length)
		{
			return;
		}
		
		var body = $('body');
		if (body.hasClass('operaMini') || body.hasClass('ancientBrowser'))
		{
			services.addClass('no-scale');
			return;
		}

		services.find('h4 a').on('mouseover mouseout', function() {
			var parent = $(this).parents('.row'),
				aside = parent.find('aside'),
				asideHeight = aside.height(),
				asideText = aside.find('strong'),
				asideTextHeight = asideText.height();
			asideText.css('padding-top', Math.floor((asideHeight - asideTextHeight) / 2));
			parent.toggleClass('link-hover');
		});
		
		var transform = testStyles(['MozTransform', 'webkitTransform', 'msTransform', 'transform']);
		if (transform == '')
		{
			return;
		}

		if (transform == 'msTransform')
		{
			services.addClass('no-scale');
		}
		
		var items = services.find('.row'),
			total = items.length,
			status = $('#status h1');
			
		if (!status.length || total < 3)
		{
			return;
		}
		
		function moveItem(item, deg, width, diffTop, diffLeft)
		{
			while (deg >= 360) deg -= 360;
			while (deg < 0) deg += 360;
			
			var sin = Math.sin(deg * Math.PI / 180),
				left = (sin + 1) * width / 2,
				top = width - (Math.cos(deg * Math.PI / 180) + 1) * width / 2;

			item.find('h4').css({
				'top'	: Math.floor(top + diffTop) + 'px',
				'left'	: Math.floor(left + diffLeft) + 'px'
			});
			
			if (sin >= 0) // && sin < 0.9)
			{
				item.find('span').addClass('right').css({
					'left': Math.floor(left + diffLeft) + 'px',
					'top': Math.floor(top + diffTop) + 'px'
				});
			}
			else
			{
				item.find('span').addClass('left').css({
					'right': Math.floor((width - left) + diffLeft) + 'px',
					'top': Math.floor(top + diffTop) + 'px'
				});
			}
		}
		
		var diff = 360 / total;
		for (var i=0; i<total; i++)
		{
			var row = items.eq(i),
				h4 = row.find('h4');
			h4.after('<aside><strong>' + h4.text() + '</strong></aside>');
			moveItem(row, diff * i, 280, 70, 60);
		}
		
		var isDown = (services.find('.status-down').length > 0),
			h2 = services.find('h2'),
			forcedView = false,
			showChart = false;

		h2.after('<div class="status-row' + (isDown ? ' status-down' : ' status-up') + '"><strong>' + status.text() + '</strong></div>');
		h2.append('<a href="javascript:void(0);" title="Change services view" class="toggle"></a>');

		var toggleList = services.add('.container');

		function resize()
		{
			var showChart = ($(window).width() > 460);
			if (showChart && forcedView)
			{
				showChart = false;
			}

			toggleList.toggleClass('flat', !showChart).toggleClass('full', showChart);
			
			if (showChart)
			{
				var status = services.find('.status-row'),
					statusHeight = status.height(),
					text = status.find('strong'),
					textHeight = text.height();
				text.css('padding-top', Math.floor((statusHeight - textHeight) / 2) + 'px');
			}
		}
		resize();
		$(window).resize(resize);

		h2.find('a').click(function()
		{
			forcedView = !forcedView;
			resize();
		});

	})();

	delete test;
});