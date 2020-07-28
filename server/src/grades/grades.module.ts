import { Module } from '@nestjs/common';
import {TypeOrmModule} from "@nestjs/typeorm";
import {Ocena} from "../entity/Ocena.entity";
import {GradesController} from "./grades.controller";
import {GradesService} from "./grades.service";

@Module({
    imports: [TypeOrmModule.forFeature([Ocena])],
    controllers: [GradesController],
    providers: [ GradesService],
    exports: [GradesService]
})
export class GradesModule {}