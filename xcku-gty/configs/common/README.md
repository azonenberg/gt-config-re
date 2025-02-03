# Generated CSV configurations for various GTYE4_COMMON setups

All configs generated with Vivado 2019.2 because of bugs preventing me from using the ultrascale+ transceivers wizard (this IP specifically) on newer Vivado versions.

## List of configs

* 01_baseline: 10Gbase-R default wizard configuration, nothing changed. 10.3125 Gbps, 156.25 MHz refclk, QPLL0
* 02_rx_qpll1: RX using same exact setup as above, but clocked by QPLL1
* 03_20g625: doubled data rate to 20.625 Gbps
* 04_20g: change data rate to 20.000 Gbps
* 05_nocode: disabled 64/66b line coder (no changes to QPLL config)
* 06_25g78125_fractionaln: QPLL0 only, 25.78125 Gbps, using fractional-N
* 07_dual_fractionaln: enable QPLL1 at 25.78125 Gbps
* 08_fractionaln_125m: same as 07 but change input clock to 125 MHz
* 09_fractionaln_100m: same as 08 but change input clock to 100 MHz
* 10_1g25: change data rate to 1.25 Gbps with 156.25 MHz refclk
