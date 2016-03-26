$(document).ready(function () {
                $.jqplot.config.enablePlugins = true;
             
                plot1 = $.jqplot('ch2', [ohlcordersCocaPayOKPay], {

                    animate: true,
                    // Will animate plot on calls to plot1.replot({resetAxes:true})
                    animateReplot: true,

                    axesDefaults: {
                        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                        tickOptions: {
                            angle: -45,
                            fontSize: '10pt'
                        }

                    },
                    axes: {
                        xaxis: {
                            renderer: $.jqplot.DateAxisRenderer,
                            tickOptions: {
                                formatString: '%R'

                            },

                            tickInterval: "1 hours",
                            drawMajorGridlines: false
                        },
                        yaxis: {
                            tickOptions: {
                                angle: 0

                            }
                        }
                    },
                    series: [{
                        renderer: $.jqplot.OHLCRenderer,
                        rendererOptions: {
                            candleStick: true
                        }
																}],
                    cursor: {
                        zoom: true,

                        tooltipOffset: 10,
                        tooltipLocation: 'nw'
                    },
                    highlighter: {
                        showMarker: false,
                        tooltipAxes: 'xy',
                        yvalues: 4,
                        formatString: '<table class="jqplot-highlighter"> \
          <tr><td>date:</td><td>%s</td></tr> \
          <tr><td>open:</td><td>%s</td></tr> \
          <tr><td>hi:</td><td>%s</td></tr> \
          <tr><td>low:</td><td>%s</td></tr> \
          <tr><td>close:</td><td>%s</td></tr></table>'
                    }
                });
            });

$(document).ready(function () {
                $.jqplot.config.enablePlugins = true;
             
                plot1 = $.jqplot('ch1', [ohlcordersCocaPayOKPay], {

                    animate: true,
                    // Will animate plot on calls to plot1.replot({resetAxes:true})
                    animateReplot: true,

                    axesDefaults: {
                        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                        tickOptions: {
                            angle: -45,
                            fontSize: '10pt'
                        }

                    },
                    axes: {
                        xaxis: {
                            renderer: $.jqplot.DateAxisRenderer,
                            tickOptions: {
                                formatString: '%R'

                            },

                            tickInterval: "1 hours",
                            drawMajorGridlines: false
                        },
                        yaxis: {
                            tickOptions: {
                                angle: 0

                            }
                        }
                    },
                    series: [{
                        renderer: $.jqplot.OHLCRenderer,
                        rendererOptions: {
                            candleStick: true
                        }
																}],
                    cursor: {
                        zoom: true,

                        tooltipOffset: 10,
                        tooltipLocation: 'nw'
                    },
                    highlighter: {
                        showMarker: false,
                        tooltipAxes: 'xy',
                        yvalues: 4,
                        formatString: '<table class="jqplot-highlighter"> \
          <tr><td>date:</td><td>%s</td></tr> \
          <tr><td>open:</td><td>%s</td></tr> \
          <tr><td>hi:</td><td>%s</td></tr> \
          <tr><td>low:</td><td>%s</td></tr> \
          <tr><td>close:</td><td>%s</td></tr></table>'
                    }
                });
            });

//$(document).ready(function () {
//                $.jqplot.config.enablePlugins = true;
//             
//                plot1 = $.jqplot('ch3', [ohlc], {
//
//                    animate: true,
//                    // Will animate plot on calls to plot1.replot({resetAxes:true})
//                    animateReplot: true,
//
//                    axesDefaults: {
//                        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
//                        tickOptions: {
//                            angle: -45,
//                            fontSize: '10pt'
//                        }
//
//                    },
//                    axes: {
//                        xaxis: {
//                            renderer: $.jqplot.DateAxisRenderer,
//                            tickOptions: {
//                                formatString: '%R'
//
//                            },
//
//                            tickInterval: "1 hours",
//                            drawMajorGridlines: false
//                        },
//                        yaxis: {
//                            tickOptions: {
//                                angle: 0
//
//                            }
//                        }
//                    },
//                    series: [{
//                        renderer: $.jqplot.OHLCRenderer,
//                        rendererOptions: {
//                            candleStick: true
//                        }
//																}],
//                    cursor: {
//                        zoom: true,
//
//                        tooltipOffset: 10,
//                        tooltipLocation: 'nw'
//                    },
//                    highlighter: {
//                        showMarker: false,
//                        tooltipAxes: 'xy',
//                        yvalues: 4,
//                        formatString: '<table class="jqplot-highlighter"> \
//          <tr><td>date:</td><td>%s</td></tr> \
//          <tr><td>open:</td><td>%s</td></tr> \
//          <tr><td>hi:</td><td>%s</td></tr> \
//          <tr><td>low:</td><td>%s</td></tr> \
//          <tr><td>close:</td><td>%s</td></tr></table>'
//                    }
//                });
//            });
//
//$(document).ready(function () {
//                $.jqplot.config.enablePlugins = true;
//             
//                plot1 = $.jqplot('ch4', [ohlc], {
//
//                    animate: true,
//                    // Will animate plot on calls to plot1.replot({resetAxes:true})
//                    animateReplot: true,
//
//                    axesDefaults: {
//                        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
//                        tickOptions: {
//                            angle: -45,
//                            fontSize: '10pt'
//                        }
//
//                    },
//                    axes: {
//                        xaxis: {
//                            renderer: $.jqplot.DateAxisRenderer,
//                            tickOptions: {
//                                formatString: '%R'
//
//                            },
//
//                            tickInterval: "1 hours",
//                            drawMajorGridlines: false
//                        },
//                        yaxis: {
//                            tickOptions: {
//                                angle: 0
//
//                            }
//                        }
//                    },
//                    series: [{
//                        renderer: $.jqplot.OHLCRenderer,
//                        rendererOptions: {
//                            candleStick: true
//                        }
//																}],
//                    cursor: {
//                        zoom: true,
//
//                        tooltipOffset: 10,
//                        tooltipLocation: 'nw'
//                    },
//                    highlighter: {
//                        showMarker: false,
//                        tooltipAxes: 'xy',
//                        yvalues: 4,
//                        formatString: '<table class="jqplot-highlighter"> \
//          <tr><td>date:</td><td>%s</td></tr> \
//          <tr><td>open:</td><td>%s</td></tr> \
//          <tr><td>hi:</td><td>%s</td></tr> \
//          <tr><td>low:</td><td>%s</td></tr> \
//          <tr><td>close:</td><td>%s</td></tr></table>'
//                    }
//                });
//            });
//
//$(document).ready(function () {
//                $.jqplot.config.enablePlugins = true;
//             
//                plot1 = $.jqplot('ch5', [ohlc], {
//
//                    animate: true,
//                    // Will animate plot on calls to plot1.replot({resetAxes:true})
//                    animateReplot: true,
//
//                    axesDefaults: {
//                        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
//                        tickOptions: {
//                            angle: -45,
//                            fontSize: '10pt'
//                        }
//
//                    },
//                    axes: {
//                        xaxis: {
//                            renderer: $.jqplot.DateAxisRenderer,
//                            tickOptions: {
//                                formatString: '%R'
//
//                            },
//
//                            tickInterval: "1 hours",
//                            drawMajorGridlines: false
//                        },
//                        yaxis: {
//                            tickOptions: {
//                                angle: 0
//
//                            }
//                        }
//                    },
//                    series: [{
//                        renderer: $.jqplot.OHLCRenderer,
//                        rendererOptions: {
//                            candleStick: true
//                        }
//																}],
//                    cursor: {
//                        zoom: true,
//
//                        tooltipOffset: 10,
//                        tooltipLocation: 'nw'
//                    },
//                    highlighter: {
//                        showMarker: false,
//                        tooltipAxes: 'xy',
//                        yvalues: 4,
//                        formatString: '<table class="jqplot-highlighter"> \
//          <tr><td>date:</td><td>%s</td></tr> \
//          <tr><td>open:</td><td>%s</td></tr> \
//          <tr><td>hi:</td><td>%s</td></tr> \
//          <tr><td>low:</td><td>%s</td></tr> \
//          <tr><td>close:</td><td>%s</td></tr></table>'
//                    }
//                });
//            });
//
//$(document).ready(function () {
//                $.jqplot.config.enablePlugins = true;
//             
//                plot1 = $.jqplot('ch6', [ohlc], {
//
//                    animate: true,
//                    // Will animate plot on calls to plot1.replot({resetAxes:true})
//                    animateReplot: true,
//
//                    axesDefaults: {
//                        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
//                        tickOptions: {
//                            angle: -45,
//                            fontSize: '10pt'
//                        }
//
//                    },
//                    axes: {
//                        xaxis: {
//                            renderer: $.jqplot.DateAxisRenderer,
//                            tickOptions: {
//                                formatString: '%R'
//
//                            },
//
//                            tickInterval: "1 hours",
//                            drawMajorGridlines: false
//                        },
//                        yaxis: {
//                            tickOptions: {
//                                angle: 0
//
//                            }
//                        }
//                    },
//                    series: [{
//                        renderer: $.jqplot.OHLCRenderer,
//                        rendererOptions: {
//                            candleStick: true
//                        }
//																}],
//                    cursor: {
//                        zoom: true,
//
//                        tooltipOffset: 10,
//                        tooltipLocation: 'nw'
//                    },
//                    highlighter: {
//                        showMarker: false,
//                        tooltipAxes: 'xy',
//                        yvalues: 4,
//                        formatString: '<table class="jqplot-highlighter"> \
//          <tr><td>date:</td><td>%s</td></tr> \
//          <tr><td>open:</td><td>%s</td></tr> \
//          <tr><td>hi:</td><td>%s</td></tr> \
//          <tr><td>low:</td><td>%s</td></tr> \
//          <tr><td>close:</td><td>%s</td></tr></table>'
//                    }
//                });
//            });