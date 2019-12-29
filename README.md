# aws-assignment
Demo showing example of a containerised LAMP application with high availability deployed on AWS.

![Containers on AWS! Awesome!](https://raw.githubusercontent.com/minimice/aws-assignment/master/demo/demo.gif)

Author: [Lim Chooi Guan](https://www.linkedin.com/in/cgl88/)

## Technology stack

* AWS ECS for containers
* AWS Cloudfront for content distribution
* AWS Aurora RDS MySQL

## Instructions

To deploy the application you will need the AWS CLI installed.  Then clone this repo, change directory to the cloudformation directory, and run the following in order from the terminal:

```
aws --region us-east-1 cloudformation create-stack --stack-name ecs-networking --template-body file://ecs-networking.yml --capabilities CAPABILITY_NAMED_IAM
```
```
aws --region us-east-1 cloudformation create-stack --stack-name ecs-public-service --template-body file://ecs-public-service.yml --capabilities CAPABILITY_NAMED_IAM
```
```
aws --region us-east-1 cloudformation create-stack --stack-name rds-aurora-mysql --template-body file://rds-aurora-mysql.yml --capabilities CAPABILITY_NAMED_IAM
```
This will deploy 3 stacks in the `us-east-1` region.  But you can deploy these in any region you deem appropriate.

1. **ecs-networking** provides the networking infrastructure (vpc, subnets, internet gateway, nat gateways, hosted zone record set).
2. **ecs-public-service** contains the service which defines the tasks (containers) to run.  The docker image used is retrieved from my [docker hub repo](https://hub.docker.com/r/minimice/php-app).  This is a php application which you can modify, it is referenced in [app/index.php](https://github.com/minimice/aws-assignment/blob/master/app/src/index.php).  The Dockerfile to build this image is stored [here](https://github.com/minimice/aws-assignment/blob/master/app/Dockerfile).
3. **rds-aurora-mysql** creates the Aurora RDS cluster with 2 MySQL database instances, one for failover purposes.

**Note: This is a demo only.**  You will have to make some minor changes by providing your own values in the Cloudformation templates.  The SSL certificate which I am using is  my own and used for the domain moocaholic.com.  Additionally code for connecting to the database including the username and password has to be provided in [app/index.php](https://github.com/minimice/aws-assignment/blob/master/app/src/index.php).  You will have to make these changes to your own Docker image and then push this image either to either Dockerhub (or Amazon ECR) and provide the URL to the **ecs-public-service** template.  Note that the retrieval of the image of baby yoda in this demo is using Cloudfront, but that is *not* automated.  Session stickiness has *not* been enabled so as to illustrate load balancing.  If you want sessions to be sticky this has to be enabled in the target group, see [here](https://docs.aws.amazon.com/elasticloadbalancing/latest/application/load-balancer-target-groups.html#sticky-sessions) for instructions.
