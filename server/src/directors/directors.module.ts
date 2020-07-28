import { Module } from '@nestjs/common';
import {TypeOrmModule} from "@nestjs/typeorm";
import {DirectorsService} from "./directors.service";
import {DirectorsController} from "./directors.controller";
import {Reziser} from "../entity/Reziser.entity";

@Module({
    imports: [TypeOrmModule.forFeature([Reziser])],
    controllers: [DirectorsController],
    providers: [DirectorsService],
    exports: [DirectorsService]
})
export class DirectorsModule {}